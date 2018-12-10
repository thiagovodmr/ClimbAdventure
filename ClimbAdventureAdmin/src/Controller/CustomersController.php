<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conn = ConnectionManager::get('default');
        $customer = $this->Customers->get($id, [
            'contain' => ['Adventures']
        ]);

        $adventure = $this->LoadModel("AdventuresCustomers");
        $adventures = $adventure->find("all")
        ->where(["customer_id" => $id])
        ->contain("adventures");

        $sql = "
           SELECT a.* FROM allergies as a 
           INNER JOIN allergies_customers as ac
           ON a.id = ac.allergy_id
           where ac.customer_id = $id    
            ";

        $stmt =  $conn->execute($sql);
        $alergias = $stmt->fetchAll("assoc");    

        $this->set('customer', $customer);
        $this->set("adventures", $adventures);
        $this->set("alergias", $alergias);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        $customer = $this->Customers->newEntity();
        $erro = false;
        
        
        if ($this->request->is('post')) {
            
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());

            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Cliente Salvo com sucesso.'));

                $array_alergias = $this->request->getData("array_alergias");
                $idCliente = $customer->id;

                if($this->request->getData("escolha") == "S"){
                    
                    foreach($array_alergias as $alergia){
                        $idAlergia = intval($alergia);
                        $sql2 = "
                            INSERT INTO allergies_customers(allergy_id,customer_id)
                            VALUES($idAlergia,$idCliente);
                            ";

                        $stmt2 =  $conn->execute($sql2);
                        if(!$stmt2){
                            exit;
                            $erro = true;
                        }    
                    }
                }
                if(!$erro){
                    return $this->redirect(['action' => 'index']);
                }else{
                    $this->Flash->error(__('Problemas ao cadastrar o cliente. Tente Novamente'));       
                }

            }else{
                $this->Flash->error(__('Problemas ao cadastrar o cliente. Tente Novamente'));
            }
       

        }

        $alergy = $this->LoadModel("Allergies");
        $alergies = $alergy->find("All");

        $adventures = $this->Customers->Adventures->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'adventures'));
        $this->set("alergias",$alergies);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Adventures']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('os dados do cliente foram atualizados com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar os dados do cliente, tente novamente por favor.'));
        }
        $adventures = $this->Customers->Adventures->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'adventures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('Cliente excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível apagar os dados do cliente.Por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function visualizarPontos(){

        $customers = $this->Customers;
        $customers = $customers
            ->find()
            ->select(['name', 'score'])
            ->order(['score' => 'DESC']);

        $this->set('customers', $customers);
    }
}
