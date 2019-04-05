<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->ItemId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->ItemId], ['confirm' => __('Are you sure you want to delete # {0}?', $item->ItemId)]) ?> </li>
        <li><?= $this->Html->link(__('List Item'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="item view large-9 medium-8 columns content">
    <h3><?= h($item->ItemId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ItemId') ?></th>
            <td><?= $this->Number->format($item->ItemId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemType') ?></th>
            <td><?= $this->Number->format($item->ItemType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserId') ?></th>
            <td><?= $this->Number->format($item->UserId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SequenceId') ?></th>
            <td><?= $this->Number->format($item->SequenceId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StageId') ?></th>
            <td><?= $this->Number->format($item->stageId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= $this->Number->format($item->Time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('XCoordinate') ?></th>
            <td><?= $this->Number->format($item->XCoordinate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('YCoordinate') ?></th>
            <td><?= $this->Number->format($item->YCoordinate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZCoordinate') ?></th>
            <td><?= $this->Number->format($item->ZCoordinate) ?></td>
        </tr>
    </table>
</div>
