<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Specialists Controller
 *
 * @property \App\Model\Table\SpecialistsTable $Specialists
 */
class SpecialistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Specialists->find();
        $specialists = $this->paginate($query);

        $this->set(compact('specialists'));
    }

    /**
     * View method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialist = $this->Specialists->get($id, contain: ['Exams']);
        $this->set(compact('specialist'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialist = $this->Specialists->newEmptyEntity();
        if ($this->request->is('post')) {
            $specialist = $this->Specialists->patchEntity($specialist, $this->request->getData());
            if ($this->Specialists->save($specialist)) {
                $this->Flash->success(__('The specialist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialist could not be saved. Please, try again.'));
        }
        $this->set(compact('specialist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialist = $this->Specialists->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialist = $this->Specialists->patchEntity($specialist, $this->request->getData());
            if ($this->Specialists->save($specialist)) {
                $this->Flash->success(__('The specialist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialist could not be saved. Please, try again.'));
        }
        $this->set(compact('specialist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialist = $this->Specialists->get($id);
        if ($this->Specialists->delete($specialist)) {
            $this->Flash->success(__('The specialist has been deleted.'));
        } else {
            $this->Flash->error(__('The specialist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
