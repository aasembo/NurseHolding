<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Timings Controller
 *
 * @property \App\Model\Table\TimingsTable $Timings
 */
class TimingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Timings->find()
            ->contain(['Exams', 'Patients']);
        $timings = $this->paginate($query);

        $this->set(compact('timings'));
    }

    /**
     * View method
     *
     * @param string|null $id Timing id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timing = $this->Timings->get($id, contain: ['Exams', 'Patients']);
        $this->set(compact('timing'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timing = $this->Timings->newEmptyEntity();
        if ($this->request->is('post')) {
            $timing = $this->Timings->patchEntity($timing, $this->request->getData());
            if ($this->Timings->save($timing)) {
                $this->Flash->success(__('The timing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timing could not be saved. Please, try again.'));
        }
        $exams = $this->Timings->Exams->find('list', limit: 200)->all();
        $patients = $this->Timings->Patients->find('list', limit: 200)->all();
        $this->set(compact('timing', 'exams', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timing id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timing = $this->Timings->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timing = $this->Timings->patchEntity($timing, $this->request->getData());
            if ($this->Timings->save($timing)) {
                $this->Flash->success(__('The timing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timing could not be saved. Please, try again.'));
        }
        $exams = $this->Timings->Exams->find('list', limit: 200)->all();
        $patients = $this->Timings->Patients->find('list', limit: 200)->all();
        $this->set(compact('timing', 'exams', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Timing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timing = $this->Timings->get($id);
        if ($this->Timings->delete($timing)) {
            $this->Flash->success(__('The timing has been deleted.'));
        } else {
            $this->Flash->error(__('The timing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
