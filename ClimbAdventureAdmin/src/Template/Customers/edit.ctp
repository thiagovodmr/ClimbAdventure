<div class="jumbotron padding-jumbotron">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <h3 class="text-center">Editar dados do cliente</h3>
        <?php
            echo $this->Form->control('Name',["label"=>"Nome"]);
            echo $this->Form->control('Adress',["label"=>"endereço"]);
            echo $this->Form->control('RG');
            echo $this->Form->control('Score');
            echo $this->Form->control('CPF');
            echo $this->Form->control('MotherName',["label" => "Nome da mãe"]);
            echo $this->Form->control('FatherName',["label" => "Nome do Pai"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Atualizar'),["class"=>"btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>
