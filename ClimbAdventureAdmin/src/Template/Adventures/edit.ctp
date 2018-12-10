<div class="jumbotron padding-jumbotron">
    <?= $this->Form->create($adventure) ?>
    <fieldset>
        <h3 class="text-center"><?= __('Editar Aventura') ?></h3>
        <?php
            echo $this->Form->control('Title',["label"=>"Título"]);
            echo $this->Form->control('Adress',["label"=>"Endereço"]);
            echo $this->Form->control('Description',["Descrição"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Atualizar'),["class"=>" btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>
