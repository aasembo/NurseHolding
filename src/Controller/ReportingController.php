<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reporting Controller
 *
 * @property \App\Model\Table\ReportingTable $Reporting
 */
class ReportingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Reporting->find()
            ->contain(['Exams']);
        $reporting = $this->paginate($query);

        $this->set(compact('reporting'));
    }

    /**
     * View method
     *
     * @param string|null $id Reporting id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reporting = $this->Reporting->get($id, contain: ['Exams']);
        $this->set(compact('reporting'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reporting = $this->Reporting->newEmptyEntity();
        if ($this->request->is('post')) {
            $reporting = $this->Reporting->patchEntity($reporting, $this->request->getData());
            if ($this->Reporting->save($reporting)) {
                $this->Flash->success(__('The reporting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporting could not be saved. Please, try again.'));
        }
        $exams = $this->Reporting->Exams->find('list', limit: 200)->all();
        $this->set(compact('reporting', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reporting id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reporting = $this->Reporting->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reporting = $this->Reporting->patchEntity($reporting, $this->request->getData());
            if ($this->Reporting->save($reporting)) {
                $this->Flash->success(__('The reporting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporting could not be saved. Please, try again.'));
        }
        $exams = $this->Reporting->Exams->find('list', limit: 200)->all();
        $this->set(compact('reporting', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reporting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reporting = $this->Reporting->get($id);
        if ($this->Reporting->delete($reporting)) {
            $this->Flash->success(__('The reporting has been deleted.'));
        } else {
            $this->Flash->error(__('The reporting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
