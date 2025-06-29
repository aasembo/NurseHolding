<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AnnouncementCategories Controller
 *
 * @property \App\Model\Table\AnnouncementCategoriesTable $AnnouncementCategories
 */
class AnnouncementCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AnnouncementCategories->find()
            ->contain(['Announcements']);
            
        $announcementCategories = $this->paginate($query);

        $this->set(compact('announcementCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Announcement Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcementCategory = $this->AnnouncementCategories->get($id, contain: ['Announcements']);
        $this->set(compact('announcementCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcementCategory = $this->AnnouncementCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $announcementCategory = $this->AnnouncementCategories->patchEntity($announcementCategory, $this->request->getData());
            if ($this->AnnouncementCategories->save($announcementCategory)) {
                $this->Flash->success(__('The announcement category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement category could not be saved. Please, try again.'));
        }
        $announcements = $this->AnnouncementCategories->Announcements->find('list', limit: 200)->all();
        $this->set(compact('announcementCategory', 'announcements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcementCategory = $this->AnnouncementCategories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcementCategory = $this->AnnouncementCategories->patchEntity($announcementCategory, $this->request->getData());
            if ($this->AnnouncementCategories->save($announcementCategory)) {
                $this->Flash->success(__('The announcement category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement category could not be saved. Please, try again.'));
        }
        $announcements = $this->AnnouncementCategories->Announcements->find('list', limit: 200)->all();
        $this->set(compact('announcementCategory', 'announcements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);

    // $announcementCategory = $this->AnnouncementCategories->get($id, [
    //     'contain' => ['Announcements']
    // ]);

    $this->AnnouncementCategories->get(id: $id, contain: ['Announcements']);


    // Prevent deletion if related announcements exist
    if (!empty($announcementCategory->announcements)) {
        $this->Flash->error(__('Cannot delete this category because it has associated announcements.'));
        return $this->redirect(['action' => 'index']);
    }

    if ($this->AnnouncementCategories->delete($announcementCategory)) {
        $this->Flash->success(__('The announcement category has been deleted.'));
    } else {
        $this->Flash->error(__('The announcement category could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
}
}
