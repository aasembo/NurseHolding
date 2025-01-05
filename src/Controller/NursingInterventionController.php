<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NursingIntervention Controller
 *
 * @property \App\Model\Table\NursingInterventionTable $NursingIntervention
 */
class NursingInterventionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->NursingIntervention->find();
        $nursingIntervention = $this->paginate($query);

        $this->set(compact('nursingIntervention'));
    }

    /**
     * View method
     *
     * @param string|null $id Nursing Intervention id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nursingIntervention = $this->NursingIntervention->get($id, contain: []);
        $this->set(compact('nursingIntervention'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nursingIntervention = $this->NursingIntervention->newEmptyEntity();
        if ($this->request->is('post')) {
            $nursingIntervention = $this->NursingIntervention->patchEntity($nursingIntervention, $this->request->getData());
            if ($this->NursingIntervention->save($nursingIntervention)) {
                $this->Flash->success(__('The nursing intervention has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nursing intervention could not be saved. Please, try again.'));
        }
        $this->set(compact('nursingIntervention'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nursing Intervention id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nursingIntervention = $this->NursingIntervention->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nursingIntervention = $this->NursingIntervention->patchEntity($nursingIntervention, $this->request->getData());
            if ($this->NursingIntervention->save($nursingIntervention)) {
                $this->Flash->success(__('The nursing intervention has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nursing intervention could not be saved. Please, try again.'));
        }
        $this->set(compact('nursingIntervention'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nursing Intervention id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nursingIntervention = $this->NursingIntervention->get($id);
        if ($this->NursingIntervention->delete($nursingIntervention)) {
            $this->Flash->success(__('The nursing intervention has been deleted.'));
        } else {
            $this->Flash->error(__('The nursing intervention could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
