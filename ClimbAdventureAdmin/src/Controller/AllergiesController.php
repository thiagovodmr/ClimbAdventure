<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Allergies Controller
 *
 * @property \App\Model\Table\AllergiesTable $Allergies
 *
 * @method \App\Model\Entity\Allergy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AllergiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $allergies = $this->paginate($this->Allergies);

        $this->set(compact('allergies'));
    }

    /**
     * View method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $allergy = $this->Allergies->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('allergy', $allergy);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $allergy = $this->Allergies->newEntity();
        if ($this->request->is('post')) {
            $allergy = $this->Allergies->patchEntity($allergy, $this->request->getData());
            if ($this->Allergies->save($allergy)) {
                $this->Flash->success(__('The allergy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allergy could not be saved. Please, try again.'));
        }
        $customers = $this->Allergies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('allergy', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $allergy = $this->Allergies->get($id, [
            'contain' => ['Customers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $allergy = $this->Allergies->patchEntity($allergy, $this->request->getData());
            if ($this->Allergies->save($allergy)) {
                $this->Flash->success(__('The allergy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allergy could not be saved. Please, try again.'));
        }
        $customers = $this->Allergies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('allergy', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $allergy = $this->Allergies->get($id);
        if ($this->Allergies->delete($allergy)) {
            $this->Flash->success(__('The allergy has been deleted.'));
        } else {
            $this->Flash->error(__('The allergy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
