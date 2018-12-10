<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AllergiesCustomer[]|\Cake\Collection\CollectionInterface $allergiesCustomers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Allergies Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Allergies'), ['controller' => 'Allergies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Allergy'), ['controller' => 'Allergies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="allergiesCustomers index large-9 medium-8 columns content">
    <h3><?= __('Allergies Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allergy_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allergiesCustomers as $allergiesCustomer): ?>
            <tr>
                <td><?= $this->Number->format($allergiesCustomer->id) ?></td>
                <td><?= $allergiesCustomer->has('allergy') ? $this->Html->link($allergiesCustomer->allergy->id, ['controller' => 'Allergies', 'action' => 'view', $allergiesCustomer->allergy->id]) : '' ?></td>
                <td><?= $allergiesCustomer->has('customer') ? $this->Html->link($allergiesCustomer->customer->id, ['controller' => 'Customers', 'action' => 'view', $allergiesCustomer->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $allergiesCustomer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $allergiesCustomer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $allergiesCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allergiesCustomer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
