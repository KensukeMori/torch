<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itemtype $itemtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemtype->ItemTypeId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemtype->ItemTypeId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Itemtype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="itemtype form large-9 medium-8 columns content">
    <?= $this->Form->create($itemtype) ?>
    <fieldset>
        <legend><?= __('Edit Itemtype') ?></legend>
        <?php
            echo $this->Form->control('ItemType');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
