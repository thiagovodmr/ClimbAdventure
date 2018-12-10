<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allergy $allergy
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Allergies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="allergies form large-9 medium-8 columns content">
    <?= $this->Form->create($allergy) ?>
    <fieldset>
        <legend><?= __('Add Allergy') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Description');
            echo $this->Form->control('customers._ids', ['options' => $customers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
