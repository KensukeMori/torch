<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stage'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="stage form large-9 medium-8 columns content">
    <?= $this->Form->create($stage) ?>
    <fieldset>
        <legend><?= __('Add Stage') ?></legend>
        <?php
            echo $this->Form->control('stageName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
