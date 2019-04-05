<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage[]|\Cake\Collection\CollectionInterface $stage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stage index large-9 medium-8 columns content">
    <h3><?= __('Stage') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('stageId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stageName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stage as $stage): ?>
            <tr>
                <td><?= $this->Number->format($stage->stageId) ?></td>
                <td><?= h($stage->stageName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stage->stageId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stage->stageId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stage->stageId], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->stageId)]) ?>
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
