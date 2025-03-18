<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExamTimings Controller
 *
 * @property \App\Model\Table\ExamTimingsTable $ExamTimings
 */
class ExamTimingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ExamTimings->find()
            ->contain(['Exams']);
        $examTimings = $this->paginate($query);

        $this->set(compact('examTimings'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam Timing id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examTiming = $this->ExamTimings->get($id, contain: ['Exams']);
        $this->set(compact('examTiming'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examTiming = $this->ExamTimings->newEmptyEntity();
        if ($this->request->is('post')) {
            $examTiming = $this->ExamTimings->patchEntity($examTiming, $this->request->getData());
            if ($this->ExamTimings->save($examTiming)) {
                $this->Flash->success(__('The exam timing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam timing could not be saved. Please, try again.'));
        }
        $exams = $this->ExamTimings->Exams->find('list', limit: 200)->all();
        $this->set(compact('examTiming', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Timing id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examTiming = $this->ExamTimings->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examTiming = $this->ExamTimings->patchEntity($examTiming, $this->request->getData());
            if ($this->ExamTimings->save($examTiming)) {
                $this->Flash->success(__('The exam timing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam timing could not be saved. Please, try again.'));
        }
        $exams = $this->ExamTimings->Exams->find('list', limit: 200)->all();
        $this->set(compact('examTiming', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Timing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examTiming = $this->ExamTimings->get($id);
        if ($this->ExamTimings->delete($examTiming)) {
            $this->Flash->success(__('The exam timing has been deleted.'));
        } else {
            $this->Flash->error(__('The exam timing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
