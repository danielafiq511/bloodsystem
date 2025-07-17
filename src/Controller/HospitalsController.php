<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Hospitals Controller
 *
 * @property \App\Model\Table\HospitalsTable $Hospitals
 */
class HospitalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Hospitals->find();
        $hospitals = $this->paginate($query);

        $this->set(compact('hospitals'));
    }

    /**
     * View method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hospital = $this->Hospitals->get($id, contain: []);
        $this->set(compact('hospital'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hospital = $this->Hospitals->newEmptyEntity();
        if ($this->request->is('post')) {
            $hospital = $this->Hospitals->patchEntity($hospital, $this->request->getData());
            if ($this->Hospitals->save($hospital)) {
                $this->Flash->success(__('The hospital has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hospital could not be saved. Please, try again.'));
        }
        $this->set(compact('hospital'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hospital = $this->Hospitals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hospital = $this->Hospitals->patchEntity($hospital, $this->request->getData());
            if ($this->Hospitals->save($hospital)) {
                $this->Flash->success(__('The hospital has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hospital could not be saved. Please, try again.'));
        }
        $this->set(compact('hospital'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hospital = $this->Hospitals->get($id);
        if ($this->Hospitals->delete($hospital)) {
            $this->Flash->success(__('The hospital has been deleted.'));
        } else {
            $this->Flash->error(__('The hospital could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
