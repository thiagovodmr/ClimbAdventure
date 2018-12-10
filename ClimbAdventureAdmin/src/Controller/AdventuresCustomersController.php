<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;

/**
 * AdventuresCustomers Controller
 *
 * @property \App\Model\Table\AdventuresCustomersTable $AdventuresCustomers
 *
 * @method \App\Model\Entity\AdventuresCustomer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdventuresCustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Adventures']
        ];
        $adventuresCustomers = $this->paginate($this->AdventuresCustomers);

        $this->set(compact('adventuresCustomers'));
    }

    /**
     * View method
     *
     * @param string|null $id Adventures Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view ($id = null)
    {
        $conn = ConnectionManager::get('default');

        $sql = "
        SELECT ac.*, a.Title
        FROM adventures_customers as ac
        INNER JOIN adventures as a on ac.adventure_id = a.id
        WHERE ac.id = $id
        ";
        $sql2 = "SELECT * from customers";

        $stmt2 =  $conn->execute($sql2);
        $stmt = $conn->execute($sql);

        $customers = $stmt2->fetchAll("assoc");
        $adventuresCustomer = $stmt->fetch('assoc');

        $this->set("customers",$customers);
        $this->set('adventuresCustomers', $adventuresCustomer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($AventuraID = null)
    {
        $conn = ConnectionManager::get('default');
        $customerModel = $this->LoadModel("Customers");
        $erro = false;

        $adventuresCustomer = $this->AdventuresCustomers->newEntity();
        $request = $this->request;

        if($request->is('post')){

            $data = strval(date($request->getData("data"))); 
            $id_aventura = intval($request->getData("adventure"));
            $customers = $request->getData("customers");
            
            $conn->begin(); 
            
            foreach($customers as $idCliente){
                $idCliente = intval($idCliente);


                 $sql ="INSERT INTO adventures_customers 
                        (customer_id, adventure_id,data) 
                        VALUES (:idCliente, :id_aventura, :data)";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":idCliente",$idCliente);
                $stmt->bindValue(":id_aventura",$id_aventura);
                $stmt->bindValue(":data", $data);

                 $resultado = $stmt->execute();
                 if(!$resultado){
                    $conn->rollback();
                    $this->Flash->error(__('Não foi possível salvar os dados, tente novamente'));
                    exit;
                }

                $sqlPontos = "UPDATE customers set score = score+1 where id = $idCliente";
                $resultadoPontos = $conn->execute($sqlPontos);
                if(!$resultadoPontos){
                    $conn->rollback();
                    $this->Flash->error(__('Não foi possível salvar os dados, tente novamente'));
                    exit;
                }
            }

            if(!$erro){
             $this->Flash->success(__('Dados salvos com sucesso.'));
             $conn->commit();
             return $this->redirect(['action' => 'index']);
         }

     }

     $sql = "SELECT * FROM customers";
     $stmt = $conn->execute($sql);
     $customers = $stmt->fetchAll('assoc');


     if(!$AventuraID == null){
       $sql2 = "SELECT * FROM adventures where id = $AventuraID";
       $stmt2 = $conn->execute($sql2);
       $adventures = $stmt2->fetchAll('assoc');
   }else{
    $sql2 = "SELECT * FROM adventures";
    $stmt2 = $conn->execute($sql2);
    $adventures = $stmt2->fetchAll('assoc');
}

$this->set("adventures",$adventures);
$this->set("customers",$customers);
$this->set("adventuresCustomer",$adventuresCustomer);
}

    /**
     * Edit method
     *
     * @param string|null $id Adventures Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adventuresCustomer = $this->AdventuresCustomers->newEntity();       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adventuresCustomer = $this->AdventuresCustomers->patchEntity($adventuresCustomer, $this->request->getData());
            if ($this->AdventuresCustomers->save($adventuresCustomer)) {
                $this->Flash->success(__('The adventures customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adventures customer could not be saved. Please, try again.'));
        }
        $customers = $this->AdventuresCustomers->Customers->find('list', ['limit' => 200]);
        $adventures = $this->AdventuresCustomers->Adventures->find('list', ['limit' => 200]);
        $this->set(compact('adventuresCustomer', 'customers', 'adventures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adventures Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $conn = ConnectionManager::get('default');
        
        $sql = "DELETE FROM adventures_customers where id = $id";
        $resultado = $conn->execute($sql);

        if(!$resultado){
         $this->Flash->error(__('Não foi possível deletar o registro.'));
     }else{
        $this->Flash->success(__('A aventura foi apagada com sucesso.'));
    }

    return $this->redirect(['action' => 'index']);
}
}
