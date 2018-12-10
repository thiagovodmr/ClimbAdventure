<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Adventures Controller
 *
 * @property \App\Model\Table\AdventuresTable $Adventures
 *
 * @method \App\Model\Entity\Adventure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdventuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $adventures = $this->paginate($this->Adventures);

        $this->set(compact('adventures'));
    }

    /**
     * View method
     *
     * @param string|null $id Adventure id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adventure = $this->Adventures->get($id, [
            'contain' => ['Customers', 'AdventuresCustomers']
        ]);

        $this->set('adventure', $adventure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adventure = $this->Adventures->newEntity();
        if ($this->request->is('post')) {
            $adventure = $this->Adventures->patchEntity($adventure, $this->request->getData());

            if ($this->Adventures->save($adventure)) {
                $this->Flash->success(__('Aventura cadastrada com sucesso.'));
                    $escolher = $this->request->getData("escolher"); 
                    if($escolher == "S"){
                        return $this->redirect(['controller'=>'AdventuresCustomers','action' => 'Add', $adventure["id"]]);
                    }else{
                        return $this->redirect(['action' => 'index']);
                    }
            }
            $this->Flash->error(__('Aventura não pode ser salva.Por favor, verifique os dados e tente novamente.'));
        }
        $customers = $this->Adventures->Customers->find('list', ['limit' => 200]);
        $this->set(compact('adventure', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adventure id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adventure = $this->Adventures->get($id, [
            'contain' => ['Customers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adventure = $this->Adventures->patchEntity($adventure, $this->request->getData());
            if ($this->Adventures->save($adventure)) {
                $this->Flash->success(__('Aventura atualizada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A aventura não pode ser salva.Por favor, verifique os dados e tente novamente.'));
        }
        $customers = $this->Adventures->Customers->find('list', ['limit' => 200]);
        $this->set(compact('adventure', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adventure id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adventure = $this->Adventures->get($id);
        if ($this->Adventures->delete($adventure)) {
            $this->Flash->success(__('Aventura deletada com sucesso.'));
        } else {
            $this->Flash->error(__('A Aventura não pode ser excluida, Tente Novamente Por Favor'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
