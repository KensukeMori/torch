<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="item index large-9 medium-8 columns content">
    <h3><?= __('Item') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ItemId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ItemType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UserId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SequenceId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stageId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('XCoordinate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('YCoordinate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ZCoordinate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($item as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->ItemId) ?></td>
                <td><?= $this->Number->format($item->ItemType) ?></td>
                <td><?= $this->Number->format($item->UserId) ?></td>
                <td><?= $this->Number->format($item->SequenceId) ?></td>
                <td><?= $this->Number->format($item->stageId) ?></td>
                <td><?= $this->Number->format($item->Time) ?></td>
                <td><?= $this->Number->format($item->XCoordinate) ?></td>
                <td><?= $this->Number->format($item->YCoordinate) ?></td>
                <td><?= $this->Number->format($item->ZCoordinate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->ItemId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->ItemId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->ItemId], ['confirm' => __('Are you sure you want to delete # {0}?', $item->ItemId)]) ?>
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
