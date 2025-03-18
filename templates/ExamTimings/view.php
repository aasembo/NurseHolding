<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamTiming $examTiming
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exam Timing'), ['action' => 'edit', $examTiming->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exam Timing'), ['action' => 'delete', $examTiming->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examTiming->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exam Timings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exam Timing'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examTimings view content">
            <h3><?= h($examTiming->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $examTiming->hasValue('exam') ? $this->Html->link($examTiming->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $examTiming->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examTiming->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($examTiming->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($examTiming->end_time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>