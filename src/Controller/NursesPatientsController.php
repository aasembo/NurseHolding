<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NursesPatients Controller
 *
 * @property \App\Model\Table\NursesPatientsTable $NursesPatients
 */
class NursesPatientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->NursesPatients->find()
            ->contain(['Nurses', 'Patients']);
        $nursesPatients = $this->paginate($query);

        $this->set(compact('nursesPatients'));
    }

    /**
     * View method
     *
     * @param string|null $id Nurses Patient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nursesPatient = $this->NursesPatients->get($id, contain: ['Nurses', 'Patients']);
        $this->set(compact('nursesPatient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nursesPatient = $this->NursesPatients->newEmptyEntity();
        if ($this->request->is('post')) {
            $nursesPatient = $this->NursesPatients->patchEntity($nursesPatient, $this->request->getData());
            if ($this->NursesPatients->save($nursesPatient)) {
                $this->Flash->success(__('The nurses patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurses patient could not be saved. Please, try again.'));
        }
        $nurses = $this->NursesPatients->Nurses->find('list', limit: 200)->all();
        $patients = $this->NursesPatients->Patients->find('list', limit: 200)->all();
        $this->set(compact('nursesPatient', 'nurses', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nurses Patient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nursesPatient = $this->NursesPatients->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nursesPatient = $this->NursesPatients->patchEntity($nursesPatient, $this->request->getData());
            if ($this->NursesPatients->save($nursesPatient)) {
                $this->Flash->success(__('The nurses patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurses patient could not be saved. Please, try again.'));
        }
        $nurses = $this->NursesPatients->Nurses->find('list', limit: 200)->all();
        $patients = $this->NursesPatients->Patients->find('list', limit: 200)->all();
        $this->set(compact('nursesPatient', 'nurses', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nurses Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nursesPatient = $this->NursesPatients->get($id);
        if ($this->NursesPatients->delete($nursesPatient)) {
            $this->Flash->success(__('The nurses patient has been deleted.'));
        } else {
            $this->Flash->error(__('The nurses patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
