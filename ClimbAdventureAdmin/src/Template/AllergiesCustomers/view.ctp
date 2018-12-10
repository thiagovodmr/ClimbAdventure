<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AllergiesCustomer $allergiesCustomer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Allergies Customer'), ['action' => 'edit', $allergiesCustomer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Allergies Customer'), ['action' => 'delete', $allergiesCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allergiesCustomer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Allergies Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Allergies Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Allergies'), ['controller' => 'Allergies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Allergy'), ['controller' => 'Allergies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="allergiesCustomers view large-9 medium-8 columns content">
    <h3><?= h($allergiesCustomer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Allergy') ?></th>
            <td><?= $allergiesCustomer->has('allergy') ? $this->Html->link($allergiesCustomer->allergy->id, ['controller' => 'Allergies', 'action' => 'view', $allergiesCustomer->allergy->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $allergiesCustomer->has('customer') ? $this->Html->link($allergiesCustomer->customer->id, ['controller' => 'Customers', 'action' => 'view', $allergiesCustomer->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($allergiesCustomer->id) ?></td>
        </tr>
    </table>
</div>
