<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ImagingRooms Controller
 *
 * @property \App\Model\Table\ImagingRoomsTable $ImagingRooms
 */
class ImagingRoomsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ImagingRooms->find();
        $imagingRooms = $this->paginate($query);

        $this->set(compact('imagingRooms'));
    }

    /**
     * View method
     *
     * @param string|null $id Imaging Room id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagingRoom = $this->ImagingRooms->get($id, contain: ['Exams', 'Patients']);
        $this->set(compact('imagingRoom'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagingRoom = $this->ImagingRooms->newEmptyEntity();
        if ($this->request->is('post')) {
            $imagingRoom = $this->ImagingRooms->patchEntity($imagingRoom, $this->request->getData());
            if ($this->ImagingRooms->save($imagingRoom)) {
                $this->Flash->success(__('The imaging room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imaging room could not be saved. Please, try again.'));
        }
        $this->set(compact('imagingRoom'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imaging Room id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagingRoom = $this->ImagingRooms->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagingRoom = $this->ImagingRooms->patchEntity($imagingRoom, $this->request->getData());
            if ($this->ImagingRooms->save($imagingRoom)) {
                $this->Flash->success(__('The imaging room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imaging room could not be saved. Please, try again.'));
        }
        $this->set(compact('imagingRoom'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imaging Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagingRoom = $this->ImagingRooms->get($id);
        if ($this->ImagingRooms->delete($imagingRoom)) {
            $this->Flash->success(__('The imaging room has been deleted.'));
        } else {
            $this->Flash->error(__('The imaging room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
