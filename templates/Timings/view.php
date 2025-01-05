<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timing $timing
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Timing'), ['action' => 'edit', $timing->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Timing'), ['action' => 'delete', $timing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timing->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Timings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Timing'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="timings view content">
            <h3><?= h($timing->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $timing->hasValue('exam') ? $this->Html->link($timing->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $timing->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $timing->hasValue('patient') ? $this->Html->link($timing->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $timing->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($timing->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($timing->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($timing->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('HOLDING') ?></th>
                    <td><?= h($timing->HOLDING) ?></td>
                </tr>
                <tr>
                    <th><?= __('DISCHARGE') ?></th>
                    <td><?= h($timing->DISCHARGE) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>