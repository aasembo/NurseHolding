<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CareAssignments Controller
 *
 * @property \App\Model\Table\CareAssignmentsTable $CareAssignments
 */
class CareAssignmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CareAssignments->find()
            ->contain(['Nurses', 'Patients']);
        $careAssignments = $this->paginate($query);

        $this->set(compact('careAssignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Care Assignment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $careAssignment = $this->CareAssignments->get($id, contain: ['Nurses', 'Patients']);
        $this->set(compact('careAssignment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $careAssignment = $this->CareAssignments->newEmptyEntity();
        if ($this->request->is('post')) {
            $careAssignment = $this->CareAssignments->patchEntity($careAssignment, $this->request->getData());
            if ($this->CareAssignments->save($careAssignment)) {
                $this->Flash->success(__('The care assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The care assignment could not be saved. Please, try again.'));
        }
        $nurses = $this->CareAssignments->Nurses->find('list', limit: 200)->all();
        $patients = $this->CareAssignments->Patients->find('list', limit: 200)->all();
        $this->set(compact('careAssignment', 'nurses', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Care Assignment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $careAssignment = $this->CareAssignments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $careAssignment = $this->CareAssignments->patchEntity($careAssignment, $this->request->getData());
            if ($this->CareAssignments->save($careAssignment)) {
                $this->Flash->success(__('The care assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The care assignment could not be saved. Please, try again.'));
        }
        $nurses = $this->CareAssignments->Nurses->find('list', limit: 200)->all();
        $patients = $this->CareAssignments->Patients->find('list', limit: 200)->all();
        $this->set(compact('careAssignment', 'nurses', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Care Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $careAssignment = $this->CareAssignments->get($id);
        if ($this->CareAssignments->delete($careAssignment)) {
            $this->Flash->success(__('The care assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The care assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
