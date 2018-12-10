<div class="container-fluid">
    <div class="jumbotron padding-jumbotron">
            <h3>Clientes</h3>              
            <table cellpadding="0" cellspacing="0" class="table-style">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col">
                            <?= $this->Paginator->sort('Name',["label"=>"Nome"]) ?>
                        </th>
                        <th scope="col">
                            <?= $this->Paginator->sort('Adress',["label"=>"Endereço"]) ?>
                            
                        </th>
                        <th scope="col">
                            <?= $this->Paginator->sort('RG') ?>
                        </th>
                        <th scope="col">
                            <?= $this->Paginator->sort('Score',["label"=>"Pontos"]) ?>
                        </th>
                        <th scope="col" class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= $this->Number->format($customer->id) ?></td>
                        <td><?= h($customer->Name) ?></td>
                        <td><?= h($customer->Adress) ?></td>
                        <td><?= h($customer->RG) ?></td>
                        <td><?= $this->Number->format($customer->Score) ?></td>
                        
                        <td class="actions">
                            <div class="flex-row">
                                <div class="col-12">
                                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $customer->id],["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="col-12">
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $customer->id],["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="col-12">
                                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $customer->id],["class"=>"btn btn-danger btn-block btn-sm"],['confirmar' => __('Tem certeza que deseja deletar # {0}?', $customer->id)]) ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __("Primeiro")) ?>
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                    <?= $this->Paginator->last(__('último') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
            </div>
        </div>
    <!-- </div> -->
</div>