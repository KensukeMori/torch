<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itemtype $itemtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Itemtype'), ['action' => 'edit', $itemtype->ItemTypeId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Itemtype'), ['action' => 'delete', $itemtype->ItemTypeId], ['confirm' => __('Are you sure you want to delete # {0}?', $itemtype->ItemTypeId)]) ?> </li>
        <li><?= $this->Html->link(__('List Itemtype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itemtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemtype view large-9 medium-8 columns content">
    <h3><?= h($itemtype->ItemTypeId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ItemType') ?></th>
            <td><?= h($itemtype->ItemType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemTypeId') ?></th>
            <td><?= $this->Number->format($itemtype->ItemTypeId) ?></td>
        </tr>
    </table>
</div>
