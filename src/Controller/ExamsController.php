<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 */
class ExamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Exams->find()
            ->contain(['Patients', 'Locations', 'ScheduledTimes', 'ImagingRooms', 'Technicians', 'Specialists']);
        $exams = $this->paginate($query);

        $this->set(compact('exams'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exam = $this->Exams->get($id, contain: ['Patients', 'Locations', 'ScheduledTimes', 'ImagingRooms', 'Technicians', 'Specialists', 'Diagnosis', 'ExamStatusUpdates', 'ExamTimings', 'PatientLogs', 'Reporting', 'Sedations']);
        $this->set(compact('exam'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exams->newEmptyEntity();
    
        if ($this->request->is('post')) {
            $data = $this->request->getData();
    
            // Ensure sedation has the correct exam_id after saving the exam
            $exam = $this->Exams->patchEntity($exam, $data, ['associated' => ['Sedations']]);
    
            if ($this->Exams->save($exam)) {
                // Assign exam_id to sedations and save them separately
                if (!empty($data['sedations'])) {
                    foreach ($data['sedations'] as &$sedation) {
                        $sedation['exam_id'] = $exam->id; // Ensure exam_id is assigned
                    }
    
                    $sedationEntities = $this->Exams->Sedations->newEntities($data['sedations']);
                    $this->Exams->Sedations->saveMany($sedationEntities);
                }
    
                $this->Flash->success(__('The exam and sedation have been saved.'));
                return $this->redirect(['action' => 'index']);
            }
    
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $patients = $this->Exams->Patients->find('list', limit: 200)->all();
        $locations = $this->Exams->Locations->find('list', limit: 200)->all();
        $scheduledTimes = $this->Exams->ScheduledTimes->find('list', limit: 200)->all();
        $imagingRooms = $this->Exams->ImagingRooms->find('list', limit: 200)->all();
        $Sedations = $this->Exams->Sedations->find('list', [
            'keyField' => 'id',
            'valueField' => 'sedation_type', // Ensure this matches your actual column name
        ])->all();
        $technicians = $this->Exams->Technicians->find('list', limit: 200)->all();
        $specialists = $this->Exams->Specialists->find('list', limit: 200)->all();
        $this->set(compact('exam', 'patients', 'locations', 'scheduledTimes', 'imagingRooms', 'technicians', 'specialists','Sedations'));
        //debug($imagingRooms);exit;
         //debug($Sedations);exit;
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => ['ScheduledTimes', 'Sedations'], // Include Sedations
        ]);
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //debug($data);
            // Ensure Sedation entities are updated correctly
            $exam = $this->Exams->patchEntity($exam, $data, ['associated' => ['Sedations']]);
    
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been updated.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be updated. Please, try again.'));
        }
        $patients = $this->Exams->Patients->find('list', limit: 200)->all();
        $locations = $this->Exams->Locations->find('list', limit: 200)->all();
        //$scheduledTimes = $this->Exams->ScheduledTimes->find('list', limit: 200)->all();
        $scheduledTimes = $this->Exams->ScheduledTimes->find('list', [
            'keyField' => 'id',
            'valueField' => 'ScheduledTime', // Adjust based on your column name
            'limit' => 200
        ])->all();
        //debug($scheduledTimes);
         //debug($exam->scheduled_time->ScheduledTime);
        $imagingRooms = $this->Exams->ImagingRooms->find('list', limit: 200)->all();
        $technicians = $this->Exams->Technicians->find('list', limit: 200)->all();
        $specialists = $this->Exams->Specialists->find('list', limit: 200)->all();
        $this->set(compact('exam', 'patients', 'locations', 'scheduledTimes', 'imagingRooms', 'technicians', 'specialists'));
        //debug($scheduledTimes->toArray());exit;
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
