<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExamStatusUpdates Controller
 *
 * @property \App\Model\Table\ExamStatusUpdatesTable $ExamStatusUpdates
 */
class ExamStatusUpdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ExamStatusUpdates->find()
            ->contain(['Exams']);
        $examStatusUpdates = $this->paginate($query);

        $this->set(compact('examStatusUpdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam Status Update id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examStatusUpdate = $this->ExamStatusUpdates->get($id, contain: ['Exams']);
        $this->set(compact('examStatusUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examStatusUpdate = $this->ExamStatusUpdates->newEmptyEntity();
        if ($this->request->is('post')) {
            $examStatusUpdate = $this->ExamStatusUpdates->patchEntity($examStatusUpdate, $this->request->getData());
            if ($this->ExamStatusUpdates->save($examStatusUpdate)) {
                $this->Flash->success(__('The exam status update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam status update could not be saved. Please, try again.'));
        }
        $exams = $this->ExamStatusUpdates->Exams->find('list', limit: 200)->all();
        $this->set(compact('examStatusUpdate', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Status Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examStatusUpdate = $this->ExamStatusUpdates->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examStatusUpdate = $this->ExamStatusUpdates->patchEntity($examStatusUpdate, $this->request->getData());
            if ($this->ExamStatusUpdates->save($examStatusUpdate)) {
                $this->Flash->success(__('The exam status update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam status update could not be saved. Please, try again.'));
        }
        $exams = $this->ExamStatusUpdates->Exams->find('list', limit: 200)->all();
        $this->set(compact('examStatusUpdate', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Status Update id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examStatusUpdate = $this->ExamStatusUpdates->get($id);
        if ($this->ExamStatusUpdates->delete($examStatusUpdate)) {
            $this->Flash->success(__('The exam status update has been deleted.'));
        } else {
            $this->Flash->error(__('The exam status update could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
