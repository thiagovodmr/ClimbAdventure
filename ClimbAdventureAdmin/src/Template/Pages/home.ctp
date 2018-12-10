<div class="conteudo mt-md-5">
  <div class="col-md-12">
    <div class="jumbotron jumbotron-pagina-inicial">
      <h3 class="text-center">Administração das viagens</h3>
      <hr>
      <div class="row">
        <?= 
        $this->Html->link("Marcar Aventura",["controller"=>"AdventuresCustomers", "action"=>"add"],["class"=>"btn btn-success btn-block"]); 
        ?>   
      </div>
      <div class="row">
        <?= 
        $this->Html->link("Ver Histórico de aventuras",["controller"=>"AdventuresCustomers", "action"=>"index"],["class"=>"btn btn-success btn-block"]); 
        ?>   
      </div>
      <hr>
      <div class="row">
        <?= 
        $this->Html->link("Visualizar pontos por frequência",["controller"=>"customers", "action"=>"visualizarPontos"],["class"=>"btn btn-success btn-block"]); 
        ?>   
      </div>
      <hr>
      <div class="row">
        <?= 
        $this->Html->link("Cadastrar clientes",["controller"=>"customers", "action"=>"add"],["class"=>"btn btn-success btn-block"]); 
        ?>  
      </div>
      <div class="row">
       <?= 
       $this->Html->link("Cadastrar aventuras",["controller"=>"adventures", "action"=>"add"],["class"=>"btn btn-success btn-block"]); 
       ?> 
     </div>
     <hr>
     <div class="row">
      <?= 
      $this->Html->link("Ver clientes cadastrados",["controller"=>"customers", "action"=>"index"],["class"=>"btn btn-success btn-block"]); 
      ?> 
    </div>
    <div class="row">
      <?= 
      $this->Html->link("Ver aventuras cadastradas",["controller"=>"adventures", "action"=>"index"],["class"=>"btn btn-success btn-block"]); 
      ?>   
    </div>
    <hr>
    <hr>
  </div>
</div>
</div>
