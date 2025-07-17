<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Donors Controller
 *
 * @property \App\Model\Table\DonorsTable $Donors
 */
class DonorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Donors->find();
        $donors = $this->paginate($query);

        $this->set(compact('donors'));
    }

    /**
     * View method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $donor = $this->Donors->get($id, contain: []);
        $this->set(compact('donor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $donor = $this->Donors->newEmptyEntity();
        if ($this->request->is('post')) {
            $donor = $this->Donors->patchEntity($donor, $this->request->getData());
            if ($this->Donors->save($donor)) {
                $this->Flash->success(__('The donor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donor could not be saved. Please, try again.'));
        }
        $this->set(compact('donor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $donor = $this->Donors->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donor = $this->Donors->patchEntity($donor, $this->request->getData());
            if ($this->Donors->save($donor)) {
                $this->Flash->success(__('The donor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donor could not be saved. Please, try again.'));
        }
        $this->set(compact('donor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $donor = $this->Donors->get($id);
        if ($this->Donors->delete($donor)) {
            $this->Flash->success(__('The donor has been deleted.'));
        } else {
            $this->Flash->error(__('The donor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
