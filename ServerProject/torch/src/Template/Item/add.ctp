<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Item'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="item form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('ItemType');
            echo $this->Form->control('UserId');
            echo $this->Form->control('SequenceId');
            echo $this->Form->control('stageId');
            echo $this->Form->control('Time');
            echo $this->Form->control('XCoordinate');
            echo $this->Form->control('YCoordinate');
            echo $this->Form->control('ZCoordinate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
