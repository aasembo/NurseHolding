<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diagnosis Controller
 *
 * @property \App\Model\Table\DiagnosisTable $Diagnosis
 */
class DiagnosisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Diagnosis->find()
            ->contain(['Exams']);
        $diagnosis = $this->paginate($query);

        $this->set(compact('diagnosis'));
    }

    /**
     * View method
     *
     * @param string|null $id Diagnosi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnosi = $this->Diagnosis->get($id, contain: ['Exams']);
        $this->set(compact('diagnosi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diagnosi = $this->Diagnosis->newEmptyEntity();
        if ($this->request->is('post')) {
            $diagnosi = $this->Diagnosis->patchEntity($diagnosi, $this->request->getData());
            if ($this->Diagnosis->save($diagnosi)) {
                $this->Flash->success(__('The diagnosi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosi could not be saved. Please, try again.'));
        }
        $exams = $this->Diagnosis->Exams->find('list', limit: 200)->all();
        $this->set(compact('diagnosi', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnosi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnosi = $this->Diagnosis->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnosi = $this->Diagnosis->patchEntity($diagnosi, $this->request->getData());
            if ($this->Diagnosis->save($diagnosi)) {
                $this->Flash->success(__('The diagnosi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosi could not be saved. Please, try again.'));
        }
        $exams = $this->Diagnosis->Exams->find('list', limit: 200)->all();
        $this->set(compact('diagnosi', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnosi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnosi = $this->Diagnosis->get($id);
        if ($this->Diagnosis->delete($diagnosi)) {
            $this->Flash->success(__('The diagnosi has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnosi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
