<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PatientLog $patientLog
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient Log'), ['action' => 'edit', $patientLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient Log'), ['action' => 'delete', $patientLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patient Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patientLogs view content">
            <h3><?= h($patientLog->reviewed_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reviewed By') ?></th>
                    <td><?= h($patientLog->reviewed_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Called By') ?></th>
                    <td><?= h($patientLog->called_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $patientLog->hasValue('exam') ? $this->Html->link($patientLog->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $patientLog->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patientLog->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comments') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($patientLog->comments)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>