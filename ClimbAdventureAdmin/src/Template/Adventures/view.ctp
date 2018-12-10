<div class="jumbotron padding-jumbotron">
    <h3 class="text-center">Detalhes da Aventura</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo / local') ?></th>
            <td><?= h($adventure->Title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereço') ?></th>
            <td><?= h($adventure->Adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descrição') ?></th>
            <td><?= h($adventure->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Banco de dados') ?></th>
            <td><?= $this->Number->format($adventure->id) ?></td>
        </tr>
    </table>
    <?= $this->Html->link("Voltar",["controller" => "adventures","action"=>"index"],["class" => "btn btn-success btn-block"]);  ?>
</div>
