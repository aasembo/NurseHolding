<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PatientLogs Controller
 *
 * @property \App\Model\Table\PatientLogsTable $PatientLogs
 */
class PatientLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PatientLogs->find()
            ->contain(['Exams']);
        $patientLogs = $this->paginate($query);

        $this->set(compact('patientLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientLog = $this->PatientLogs->get($id, contain: ['Exams']);
        $this->set(compact('patientLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientLog = $this->PatientLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $patientLog = $this->PatientLogs->patchEntity($patientLog, $this->request->getData());
            if ($this->PatientLogs->save($patientLog)) {
                $this->Flash->success(__('The patient log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient log could not be saved. Please, try again.'));
        }
        $exams = $this->PatientLogs->Exams->find('list', limit: 200)->all();
        $this->set(compact('patientLog', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientLog = $this->PatientLogs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientLog = $this->PatientLogs->patchEntity($patientLog, $this->request->getData());
            if ($this->PatientLogs->save($patientLog)) {
                $this->Flash->success(__('The patient log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient log could not be saved. Please, try again.'));
        }
        $exams = $this->PatientLogs->Exams->find('list', limit: 200)->all();
        $this->set(compact('patientLog', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientLog = $this->PatientLogs->get($id);
        if ($this->PatientLogs->delete($patientLog)) {
            $this->Flash->success(__('The patient log has been deleted.'));
        } else {
            $this->Flash->error(__('The patient log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
