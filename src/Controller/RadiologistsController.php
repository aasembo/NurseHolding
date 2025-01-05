<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Radiologists Controller
 *
 * @property \App\Model\Table\RadiologistsTable $Radiologists
 */
class RadiologistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Radiologists->find();
        $radiologists = $this->paginate($query);

        $this->set(compact('radiologists'));
    }

    /**
     * View method
     *
     * @param string|null $id Radiologist id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $radiologist = $this->Radiologists->get($id, contain: []);
        $this->set(compact('radiologist'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $radiologist = $this->Radiologists->newEmptyEntity();
        if ($this->request->is('post')) {
            $radiologist = $this->Radiologists->patchEntity($radiologist, $this->request->getData());
            if ($this->Radiologists->save($radiologist)) {
                $this->Flash->success(__('The radiologist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The radiologist could not be saved. Please, try again.'));
        }
        $this->set(compact('radiologist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Radiologist id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $radiologist = $this->Radiologists->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $radiologist = $this->Radiologists->patchEntity($radiologist, $this->request->getData());
            if ($this->Radiologists->save($radiologist)) {
                $this->Flash->success(__('The radiologist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The radiologist could not be saved. Please, try again.'));
        }
        $this->set(compact('radiologist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Radiologist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $radiologist = $this->Radiologists->get($id);
        if ($this->Radiologists->delete($radiologist)) {
            $this->Flash->success(__('The radiologist has been deleted.'));
        } else {
            $this->Flash->error(__('The radiologist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
