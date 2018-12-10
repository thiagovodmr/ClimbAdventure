<div class="jumbotron padding-jumbotron">
    <h3 class="text-center">Detalhes do cliente </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id do banco de dados') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($customer->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereço') ?></th>
            <td><?= h($customer->Adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RG') ?></th>
            <td><?= h($customer->RG) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CPF') ?></th>
            <td><?= h($customer->CPF) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome da mãe') ?></th>
            <td><?= h($customer->MotherName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome do pai') ?></th>
            <td><?= h($customer->FatherName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score / pontuação') ?></th>
            <td><?= $this->Number->format($customer->Score) ?></td>
        </tr>
    </table>

    <h4 class="text-center"><?= __('Históricos de aventuras') ?></h4>
    <div class="related scroll">
        <table cellpadding="0" cellspacing="0" class="table-style">
            <tr>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Endereços') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($adventures as $adventure): ?>
                <tr>
                    <td><?= h($adventure["Adventures"]["Title"]) ?></td>
                    <td><?= h($adventure["Adventures"]["Adress"]) ?></td>
                    <td><?= h($adventure["data"]) ?></td>
                    <td class="actions">
                        <div class="flex-row">
                            <?= 
                            $this->Form->postLink(
                                __('Deletar'), 
                                ["controller"=>"AdventuresCustomers",'action' => 'delete', intval($adventure["id"])]
                                ,["class"=>"btn btn-danger btn-block btn-sm"], 
                                ['confirm' => __('Tem certeza que deseja deletar # {0}?', intval($adventure["id"]))
                            ]) ?>
                        </div> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <hr>


    <h4 class="text-center"><?= __('alergias') ?></h4>
    <div class="related scroll text-center">
        <table cellpadding="0" cellspacing="0" class="table-style">
            <tr>
                <th scope="col"><?= __('Nome das alergias') ?></th>
            </tr>
            <?php foreach ($alergias as $alergia): ?>
                    <tr>
                        <td><?= $alergia["Name"] ?></td>
                    </tr>
            <?php endforeach ?>
        </table>  
    </div>


