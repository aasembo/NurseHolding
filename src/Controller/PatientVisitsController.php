<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PatientVisits Controller
 *
 * @property \App\Model\Table\PatientVisitsTable $PatientVisits
 */
class PatientVisitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PatientVisits->find()
            ->contain(['Patients']);
        $patientVisits = $this->paginate($query);

        $this->set(compact('patientVisits'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient Visit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientVisit = $this->PatientVisits->get($id, contain: ['Patients']);
        $this->set(compact('patientVisit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientVisit = $this->PatientVisits->newEmptyEntity();
        if ($this->request->is('post')) {
            $patientVisit = $this->PatientVisits->patchEntity($patientVisit, $this->request->getData());
            if ($this->PatientVisits->save($patientVisit)) {
                $this->Flash->success(__('The patient visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient visit could not be saved. Please, try again.'));
        }
        $patients = $this->PatientVisits->Patients->find('list', limit: 200)->all();
        $this->set(compact('patientVisit', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Visit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientVisit = $this->PatientVisits->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientVisit = $this->PatientVisits->patchEntity($patientVisit, $this->request->getData());
            if ($this->PatientVisits->save($patientVisit)) {
                $this->Flash->success(__('The patient visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient visit could not be saved. Please, try again.'));
        }
        $patients = $this->PatientVisits->Patients->find('list', limit: 200)->all();
        $this->set(compact('patientVisit', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Visit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientVisit = $this->PatientVisits->get($id);
        if ($this->PatientVisits->delete($patientVisit)) {
            $this->Flash->success(__('The patient visit has been deleted.'));
        } else {
            $this->Flash->error(__('The patient visit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
