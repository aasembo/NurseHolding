<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ScheduledTime Controller
 *
 * @property \App\Model\Table\ScheduledTimeTable $ScheduledTime
 */
class ScheduledTimeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ScheduledTime->find();
        $scheduledTime = $this->paginate($query);

        $this->set(compact('scheduledTime'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Time id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduledTime = $this->ScheduledTime->get($id, contain: ['Exams']);
        $this->set(compact('scheduledTime'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduledTime = $this->ScheduledTime->newEmptyEntity();
        if ($this->request->is('post')) {
            $scheduledTime = $this->ScheduledTime->patchEntity($scheduledTime, $this->request->getData());
            if ($this->ScheduledTime->save($scheduledTime)) {
                $this->Flash->success(__('The scheduled time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled time could not be saved. Please, try again.'));
        }
        $this->set(compact('scheduledTime'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduled Time id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduledTime = $this->ScheduledTime->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledTime = $this->ScheduledTime->patchEntity($scheduledTime, $this->request->getData());
            if ($this->ScheduledTime->save($scheduledTime)) {
                $this->Flash->success(__('The scheduled time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled time could not be saved. Please, try again.'));
        }
        $this->set(compact('scheduledTime'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduled Time id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduledTime = $this->ScheduledTime->get($id);
        if ($this->ScheduledTime->delete($scheduledTime)) {
            $this->Flash->success(__('The scheduled time has been deleted.'));
        } else {
            $this->Flash->error(__('The scheduled time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
