<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->UserId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->UserId], ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserId)]) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="user view large-9 medium-8 columns content">
    <h3><?= h($user->UserId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserId') ?></th>
            <td><?= $this->Number->format($user->UserId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TotalSequence') ?></th>
            <td><?= $this->Number->format($user->TotalSequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($user->Date) ?></td>
        </tr>
    </table>
</div>
