<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AllergiesCustomers Controller
 *
 * @property \App\Model\Table\AllergiesCustomersTable $AllergiesCustomers
 *
 * @method \App\Model\Entity\AllergiesCustomer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AllergiesCustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Allergies', 'Customers']
        ];
        $allergiesCustomers = $this->paginate($this->AllergiesCustomers);

        $this->set(compact('allergiesCustomers'));
    }

    /**
     * View method
     *
     * @param string|null $id Allergies Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $allergiesCustomer = $this->AllergiesCustomers->get($id, [
            'contain' => ['Allergies', 'Customers']
        ]);

        $this->set('allergiesCustomer', $allergiesCustomer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $allergiesCustomer = $this->AllergiesCustomers->newEntity();
        if ($this->request->is('post')) {
            $allergiesCustomer = $this->AllergiesCustomers->patchEntity($allergiesCustomer, $this->request->getData());
            
            if ($this->AllergiesCustomers->save($allergiesCustomer)) {
                $this->Flash->success(__('The allergies customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allergies customer could not be saved. Please, try again.'));
        }
        $allergies = $this->AllergiesCustomers->Allergies->find('list', ['limit' => 200]);
        $customers = $this->AllergiesCustomers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('allergiesCustomer', 'allergies', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Allergies Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $allergiesCustomer = $this->AllergiesCustomers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $allergiesCustomer = $this->AllergiesCustomers->patchEntity($allergiesCustomer, $this->request->getData());
            if ($this->AllergiesCustomers->save($allergiesCustomer)) {
                $this->Flash->success(__('The allergies customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allergies customer could not be saved. Please, try again.'));
        }
        $allergies = $this->AllergiesCustomers->Allergies->find('list', ['limit' => 200]);
        $customers = $this->AllergiesCustomers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('allergiesCustomer', 'allergies', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Allergies Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $allergiesCustomer = $this->AllergiesCustomers->get($id);
        if ($this->AllergiesCustomers->delete($allergiesCustomer)) {
            $this->Flash->success(__('The allergies customer has been deleted.'));
        } else {
            $this->Flash->error(__('The allergies customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
