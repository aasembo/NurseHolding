<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Collection\Collection;

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
            ->contain(['Patients', 'Locations', 'ScheduledTime', 'ImagingRooms']);
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
        $exam = $this->Exams->get($id, contain: ['Patients', 'Locations', 'ScheduledTime', 'ImagingRooms', 'Diagnosis', 'Reporting', 'Sedations', 'Timings']);
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
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        //$patients = $this->Exams->Patients->find('list', limit: 200)->all();
        $patients = $this->Exams->Patients->find('list', [
            'keyField' => 'id',
            'valueField' => function ($row) {
                return $row['FirstName'] . ' ' . $row['LastName'] . ' (MRN: ' . $row['medical_record_number'] . ')';
            }
        ])->toArray();
        
        //$this->set(compact('patients'));

        $locations = $this->Exams->Locations->find('list', limit: 200)->all();
        $scheduledTime = $this->Exams->ScheduledTime->find('list', limit: 200)->all();
        $imagingRooms = $this->Exams->ImagingRooms->find('list', limit: 200)->all();
        $this->set(compact('exam', 'patients', 'locations', 'scheduledTime', 'imagingRooms'));
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
        $exam = $this->Exams->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $patients = $this->Exams->Patients->find('list', limit: 200)->all();
        $locations = $this->Exams->Locations->find('list', limit: 200)->all();
        $scheduledTime = $this->Exams->ScheduledTime->find('list', limit: 200)->all();
        $imagingRooms = $this->Exams->ImagingRooms->find('list', limit: 200)->all();
        $this->set(compact('exam', 'patients', 'locations', 'scheduledTime', 'imagingRooms'));
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
