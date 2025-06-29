<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Http\Exception\BadRequestException;
use Psr\Http\Message\UploadedFileInterface;

class AnnouncementsController extends AppController
{
    public function index()
    {
        $query = $this->Announcements->find();
        $announcements = $this->paginate($query);
        $this->set(compact('announcements'));
    }

    public function view($id = null)
    {

        $announcement = $this->Announcements->get($id, contain: ['AnnouncementCategories']);
        $this->set(compact('announcement'));
    }

    public function add()
    {
        $announcement = $this->Announcements->newEmptyEntity();

        $departments = [
            'nurses' => 'Nurses',
            'specialists' => 'Specialists',
            'technicians' => 'Technicians'
        ];

        $departmentUsers = [];

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // // Cast department_ids
            // if (!empty($data['department_ids']) && is_numeric($data['department_ids'])) {
            //     $data['department_ids'] = (int)$data['department_ids'];
            // }

            // Get users from selected department
            if (!empty($data['department']) && isset($departments[$data['department']])) {
                $modelName = ucfirst($data['department']);
                $usersTable = $this->fetchTable($modelName);
                $departmentUsers = $usersTable->find('list')->toArray();
            }

            if (isset($data['department_ids']) && is_array($data['department_ids'])) {
                $data['department_ids'] = implode(',', $data['department_ids']); // Or use JSON
            }

            // Handle audience logic
            if ($data['audience_type'] === 'all') {
                $data['department'] = null;
                $data['department_ids'] = null;
            } elseif ($data['audience_type'] === 'department') {
                $data['department_ids'] = null;
            } elseif ($data['audience_type'] === 'individual') {
                if (empty($data['department']) || empty($data['department_ids'])) {
                    $this->Flash->error(__('Please select a department and a user for individual announcements.'));
                    $this->set(compact('announcement', 'departments', 'departmentUsers'));
                    return;
                }
            }

             // ✅ Handle image upload only if file is uploaded
                $image = $this->request->getData('image_file');
                if ($image && $image->getError() === UPLOAD_ERR_OK) {
                    $filename = time() . '_' . $image->getClientFilename();
                    $uploadPath = WWW_ROOT . 'img/uploads/' . $filename;
                    $image->moveTo($uploadPath);
                    $data['image_file'] = 'uploads/' . $filename;
                } else {
                    $data['image_file'] = 'placeholder.png';
                }
            // unset($data['image_file']); // avoids mass-assignment errors

            $announcement = $this->Announcements->patchEntity($announcement, $data);

            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                return $this->redirect(['action' => 'index']);
            }else{
                debug($announcement);
            }

            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }

        $announcementCategoriesTable = $this->fetchTable('AnnouncementCategories');
        $announcementCategories = $announcementCategoriesTable->find('list')->toArray();
        $this->set(compact('announcementCategories'));

        $this->set(compact('announcement', 'departments', 'departmentUsers'));
    }

    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, contain: []);
        $departments = [
            'nurses' => 'Nurses',
            'specialists' => 'Specialists',
            'technicians' => 'Technicians'
        ];
        $departmentUsers = [];

        $department = $announcement->department; // e.g., 'nurses'
        $tableName = ucfirst($department);       // e.g., 'Nurses'

        $usersTable = $this->fetchTable($tableName);
        $departmentUsers = $usersTable->find('list')->toArray();


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            if (isset($data['department_ids']) && is_array($data['department_ids'])) {
                $data['department_ids'] = implode(',', $data['department_ids']); // Or use JSON
            }

            // Handle audience logic
            if ($data['audience_type'] === 'all') {
                $data['department'] = null;
                $data['department_ids'] = null;
            } elseif ($data['audience_type'] === 'department') {
                $data['department_ids'] = null;
            } elseif ($data['audience_type'] === 'individual') {
                if (empty($data['department_ids']) || empty($data['department_ids'])) {
                    $this->Flash->error(__('Please select a department and a user for individual announcements.'));
                    $this->set(compact('announcement', 'departments'));
                    return;
                }

                // Fetch department users for dropdown
                $modelName = ucfirst($data['department']);
                $usersTable = $this->fetchTable($modelName);
                $departmentUsers = $usersTable->find('list')->toArray();
            }
           
            // ✅ Handle image upload
            $image = $this->request->getData('image_file');
            if ($image && $image->getError() === UPLOAD_ERR_OK) {
                $filename = time() . '_' . $image->getClientFilename();
                $uploadPath = WWW_ROOT . 'img/uploads/' . $filename;
                $image->moveTo($uploadPath);
                $data['image_file'] = 'uploads/' . $filename;
            }else {
                    // If no new file uploaded, keep old image
                    $data['image_file'] = $announcement->image_file;
                }
                
                
            $announcement = $this->Announcements->patchEntity($announcement, $data);

            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }

        if (!empty($announcement->department)) {
            $modelName = ucfirst($announcement->department);
            $usersTable = $this->fetchTable($modelName);
            $departmentUsers = $usersTable->find('list')->toArray();
        }

        if (is_string($announcement->department_ids)) {
            $announcement->department_ids = explode(',', $announcement->department_ids);
        }
        // debug($announcement->department_ids);

        $announcementCategoriesTable = $this->fetchTable('AnnouncementCategories');
        $announcementCategories = $announcementCategoriesTable->find('list')->toArray();
        $this->set(compact('announcementCategories'));

        $this->set(compact('announcement', 'departments', 'departmentUsers'));
    }

    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $announcement = $this->Announcements->get($id);
    //     if ($this->Announcements->delete($announcement)) {
    //         $this->Flash->success(__('The announcement has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getUsersByDepartment()
    {
        $this->request->allowMethod(['get', 'ajax']);
        $this->autoRender = false;

        $department = $this->request->getQuery('department');

        if (!in_array($department, ['patients', 'nurses', 'specialists', 'technicians'])) {
            throw new BadRequestException('Invalid department');
        }

        $model = ucfirst($department);
        $usersTable = $this->fetchTable($model);
        $users = $usersTable->find('list')->toArray();

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode($users));
        return $this->response;
    }
}
