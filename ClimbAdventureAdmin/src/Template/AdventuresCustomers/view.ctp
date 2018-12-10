<div class="jumbotron padding-jumbotron ">
    <h3 class="text-center">Detalhes da Aventura</h3>
    <table class="vertical-table">     
        <tr>
            <th scope="row"><?= __('Aventura') ?></th>
            <td><?= h($adventuresCustomers["Title"]) ?><td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($adventuresCustomers["data"]) ?><td>
        </tr>
    </table>
    <hr>
    <h3 class="text-center">Clientes que participaram dessa viagem</h3>
    <div class="related scroll">
        <?php if (!empty($customers)): ?>
                <table cellpadding="0" cellspacing="0" class="table-style">
                    <tr>
                        <th scope="col"><?= __('Nome') ?></th>
                        <th scope="col"><?= __('Endereços') ?></th>
                        <th scope="col" class="actions"><?= __('Ações') ?></th>
                    </tr>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= $customer["Name"] ?></td>
                            <td><?= $customer["Adress"] ?></td>
                            <td class="actions">
                                <div class="flex-row">
                                    <?= 
                                    $this->Form->postLink(
                                        __('Deletar'), 
                                        ["controller"=>"customers",'action' => 'delete', intval($customer["id"])]
                                        ,["class"=>"btn btn-danger btn-block btn-sm"], 
                                        ['confirm' => __('Tem certeza que deseja deletar # {0}?', intval($customer["id"]))
                                        ]) ?>
                                </div>
                                <div class="flex-row">       
                                        <?= 
                                    $this->Form->postLink(
                                        __('detalhes'), 
                                        ["controller"=>"customers",'action' => 'view', intval($customer["id"])]
                                        ,["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <div class="alert alert-success text-center">
                    <h3>Não Participou de nenhuma viagem ainda</h3>
                </div>
        <?php endif; ?>
    </div>
     <?= $this->Html->link("Voltar",["controller" => "AdventuresCustomers","action"=>"index"],["class" => "btn btn-success btn-block"]);  ?>
</div>
