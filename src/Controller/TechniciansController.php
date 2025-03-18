<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Technicians Controller
 *
 * @property \App\Model\Table\TechniciansTable $Technicians
 */
class TechniciansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Technicians->find();
        $technicians = $this->paginate($query);

        $this->set(compact('technicians'));
    }

    /**
     * View method
     *
     * @param string|null $id Technician id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $technician = $this->Technicians->get($id, contain: ['Exams']);
        $this->set(compact('technician'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $technician = $this->Technicians->newEmptyEntity();
        if ($this->request->is('post')) {
            $technician = $this->Technicians->patchEntity($technician, $this->request->getData());
            if ($this->Technicians->save($technician)) {
                $this->Flash->success(__('The technician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technician could not be saved. Please, try again.'));
        }
        $this->set(compact('technician'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Technician id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $technician = $this->Technicians->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $technician = $this->Technicians->patchEntity($technician, $this->request->getData());
            if ($this->Technicians->save($technician)) {
                $this->Flash->success(__('The technician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technician could not be saved. Please, try again.'));
        }
        $this->set(compact('technician'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Technician id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $technician = $this->Technicians->get($id);
        if ($this->Technicians->delete($technician)) {
            $this->Flash->success(__('The technician has been deleted.'));
        } else {
            $this->Flash->error(__('The technician could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
