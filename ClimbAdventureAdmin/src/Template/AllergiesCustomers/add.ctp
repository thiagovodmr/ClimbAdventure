<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AllergiesCustomer $allergiesCustomer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Allergies Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Allergies'), ['controller' => 'Allergies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Allergy'), ['controller' => 'Allergies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="allergiesCustomers form large-9 medium-8 columns content">
    <?= $this->Form->create($allergiesCustomer) ?>
    <fieldset>
        <legend><?= __('Add Allergies Customer') ?></legend>
        <?php
            echo $this->Form->control('allergy_id', ['options' => $allergies]);
            echo $this->Form->control('customer_id', ['options' => $customers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
