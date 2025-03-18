<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamStatusUpdate $examStatusUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exam Status Update'), ['action' => 'edit', $examStatusUpdate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exam Status Update'), ['action' => 'delete', $examStatusUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examStatusUpdate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exam Status Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exam Status Update'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examStatusUpdates view content">
            <h3><?= h($examStatusUpdate->event_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $examStatusUpdate->hasValue('exam') ? $this->Html->link($examStatusUpdate->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $examStatusUpdate->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Event Type') ?></th>
                    <td><?= h($examStatusUpdate->event_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examStatusUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Timestamp') ?></th>
                    <td><?= h($examStatusUpdate->timestamp) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>