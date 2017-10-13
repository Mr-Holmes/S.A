<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turma $turma
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Turma'), ['action' => 'edit', $turma->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Turma'), ['action' => 'delete', $turma->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turma->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Turmas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turma'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="turmas view large-9 medium-8 columns content">
    <h3><?= h($turma->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Teacher') ?></th>
            <td><?= $turma->has('teacher') ? $this->Html->link($turma->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $turma->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $turma->has('subject') ? $this->Html->link($turma->subject->id, ['controller' => 'Subjects', 'action' => 'view', $turma->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($turma->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semestre') ?></th>
            <td><?= $this->Number->format($turma->semestre) ?></td>
        </tr>
    </table>
</div>
