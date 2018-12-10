<div class="jumbotron padding-jumbotron">
    <h3 class="text-center"><?= __('Histórico de Aventuras') ?></h3>
        <table cellpadding="0" cellspacing="0" class="table-style">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col">Aventura</th>
                    <th scope="col"><?= $this->Paginator->sort('data',["label"=>"Data"]) ?></th>
                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adventuresCustomers as $adventuresCustomer): ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($adventuresCustomer->id) ?></td>

                            <td><?= $adventuresCustomer->has('adventure') ? $this->Html->link($adventuresCustomer->adventure->Title, ['controller' => 'Adventures', 'action' => 'view', $adventuresCustomer->adventure->id]) : '' ?></td>
                    
                            <td><?= h($adventuresCustomer->data) ?></td>
                            <td class="actions">
                                <div class="flex-row">
                                    <?= $this->Html->link(
                                        __('Detalhes'), 
                                        ['action' => 'view', 
                                            $adventuresCustomer->id
                                        ],
                                        ["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                                <div class="flex-row">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $adventuresCustomer->id],["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                                <div class="flex-row">
                                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $adventuresCustomer->id],["class"=>"btn btn-danger btn-block btn-sm"], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $adventuresCustomer->id)]) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                    <?= $this->Paginator->last(__('Último') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros de {{count}} no total')]) ?></p>
            </div>
    </div>
