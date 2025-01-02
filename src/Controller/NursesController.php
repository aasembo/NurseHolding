<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nurses Controller
 *
 * @property \App\Model\Table\NursesTable $Nurses
 */
class NursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Nurses->find();
        $nurses = $this->paginate($query);

        $this->set(compact('nurses'));
    }

    /**
     * View method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nurse = $this->Nurses->get($id, contain: ['Patients']);
        $this->set(compact('nurse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nurse = $this->Nurses->newEmptyEntity();
        if ($this->request->is('post')) {
            $nurse = $this->Nurses->patchEntity($nurse, $this->request->getData());
            if ($this->Nurses->save($nurse)) {
                $this->Flash->success(__('The nurse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurse could not be saved. Please, try again.'));
        }
        $patients = $this->Nurses->Patients->find('list', limit: 200)->all();
        $this->set(compact('nurse', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nurse = $this->Nurses->get($id, contain: ['Patients']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nurse = $this->Nurses->patchEntity($nurse, $this->request->getData());
            if ($this->Nurses->save($nurse)) {
                $this->Flash->success(__('The nurse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurse could not be saved. Please, try again.'));
        }
        $patients = $this->Nurses->Patients->find('list', limit: 200)->all();
        $this->set(compact('nurse', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nurse = $this->Nurses->get($id);
        if ($this->Nurses->delete($nurse)) {
            $this->Flash->success(__('The nurse has been deleted.'));
        } else {
            $this->Flash->error(__('The nurse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
