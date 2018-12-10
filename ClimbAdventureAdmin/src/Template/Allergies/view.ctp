<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allergy $allergy
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Allergy'), ['action' => 'edit', $allergy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Allergy'), ['action' => 'delete', $allergy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allergy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Allergies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Allergy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="allergies view large-9 medium-8 columns content">
    <h3><?= h($allergy->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($allergy->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($allergy->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($allergy->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($allergy->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Adress') ?></th>
                <th scope="col"><?= __('RG') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('CPF') ?></th>
                <th scope="col"><?= __('MotherName') ?></th>
                <th scope="col"><?= __('FatherName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($allergy->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->Name) ?></td>
                <td><?= h($customers->Adress) ?></td>
                <td><?= h($customers->RG) ?></td>
                <td><?= h($customers->Score) ?></td>
                <td><?= h($customers->CPF) ?></td>
                <td><?= h($customers->MotherName) ?></td>
                <td><?= h($customers->FatherName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
