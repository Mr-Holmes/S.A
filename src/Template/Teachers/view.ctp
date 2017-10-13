<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Turmas'), ['controller' => 'Turmas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turma'), ['controller' => 'Turmas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($teacher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($teacher->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siape') ?></th>
            <td><?= h($teacher->siape) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Turmas') ?></h4>
        <?php if (!empty($teacher->turmas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Teacher Id') ?></th>
                <th scope="col"><?= __('Subject Id') ?></th>
                <th scope="col"><?= __('Semestre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teacher->turmas as $turmas): ?>
            <tr>
                <td><?= h($turmas->id) ?></td>
                <td><?= h($turmas->teacher_id) ?></td>
                <td><?= h($turmas->subject_id) ?></td>
                <td><?= h($turmas->semestre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Turmas', 'action' => 'view', $turmas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Turmas', 'action' => 'edit', $turmas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Turmas', 'action' => 'delete', $turmas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turmas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
