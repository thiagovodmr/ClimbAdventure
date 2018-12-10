<div class="jumbotron padding-jumbotron">
    <?= $this->Form->create($adventure) ?>
    <fieldset>
        <h3 class="text-center"><?= __('Cadastrar Aventura') ?></h3>
        <?php
        echo $this->Form->control('Title',["label"=>"Título","class"=>"form-control"]);
        echo $this->Form->control('Adress',["label"=>"Endereço","class"=>"form-control"]);
        echo $this->Form->control('Description',["label"=> "Descrição do lugar - (Não Obrigatório)","class"=>"form-control"]);
        ?>
        <div class="container-alergia">
            <span class="mr-4">Escolher os clientes que vão para essa viagem agora?</span>
            <span>
              <input type="radio" name="escolher" value="N"
              checked>
              <label>Não</label>
          </span>
          <span>
              <input type="radio" name="escolher" value="S">
              <label>Sim</label>
          </span>
          <div class="alert alert-info">
              <p>
                OBS:   Se marcar SIM, ao clicar em cadastrar você será redirecionado para página de escolha dos clientes. <br> Mas você poderá adicionar clientes a essa aventura quando quiser, caso não queira cadastrar agora.
            </p>
          </div>
      </div>
  </fieldset>
  <?= $this->Form->button(__('Cadastrar'),["class"=>"btn btn-success btn-block"]) ?>
  <?= $this->Form->end() ?>
</div>
