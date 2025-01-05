<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sedations Controller
 *
 * @property \App\Model\Table\SedationsTable $Sedations
 */
class SedationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Sedations->find()
            ->contain(['Exams']);
        $sedations = $this->paginate($query);

        $this->set(compact('sedations'));
    }

    /**
     * View method
     *
     * @param string|null $id Sedation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sedation = $this->Sedations->get($id, contain: ['Exams', 'Patients']);
        $this->set(compact('sedation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sedation = $this->Sedations->newEmptyEntity();
        if ($this->request->is('post')) {
            $sedation = $this->Sedations->patchEntity($sedation, $this->request->getData());
            if ($this->Sedations->save($sedation)) {
                $this->Flash->success(__('The sedation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sedation could not be saved. Please, try again.'));
        }
        $exams = $this->Sedations->Exams->find('list', limit: 200)->all();
        $this->set(compact('sedation', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sedation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sedation = $this->Sedations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sedation = $this->Sedations->patchEntity($sedation, $this->request->getData());
            if ($this->Sedations->save($sedation)) {
                $this->Flash->success(__('The sedation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sedation could not be saved. Please, try again.'));
        }
        $exams = $this->Sedations->Exams->find('list', limit: 200)->all();
        $this->set(compact('sedation', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sedation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sedation = $this->Sedations->get($id);
        if ($this->Sedations->delete($sedation)) {
            $this->Flash->success(__('The sedation has been deleted.'));
        } else {
            $this->Flash->error(__('The sedation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
