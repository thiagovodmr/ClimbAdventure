<div class="container">
    <div class="jumbotron padding-jumbotron">
            <h3><?= __('Aventuras') ?></h3>
            <table cellpadding="0" cellspacing="0" class="table-style">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Title',["label"=>"Titulo"]) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Adress',["label"=>"Endereço"]) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Descrição') ?></th>
                        <th scope="col" class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adventures as $adventure): ?>
                        <tr>
                            <td><?= $this->Number->format($adventure->id) ?></td>
                            <td><?= h($adventure->Title) ?></td>
                            <td><?= h($adventure->Adress) ?></td>
                            <td><?= h($adventure->Description) ?></td>
                            <td class="actions">
                                <div class="flex-row">
                                    <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $adventure->id],["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                                <div class="flex-row">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $adventure->id],["class"=>"btn btn-success btn-block btn-sm"]) ?>
                                </div>
                                <div class="flex-row">
                                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $adventure->id],["class"=>"btn btn-danger btn-block btn-sm"], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $adventure->id)]) ?>
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
                    <?= $this->Paginator->last(__('Ùltimo') . ' >>') ?>
                </ul>
                <p>
                    <?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?>
                </p>
            </div>
        </div>
 
</div>
