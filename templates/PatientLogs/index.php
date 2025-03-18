<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PatientLog> $patientLogs
 */
?>
<div class="patientLogs index content">
    <?= $this->Html->link(__('New Patient Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Patient Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('reviewed_by') ?></th>
                    <th><?= $this->Paginator->sort('called_by') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patientLogs as $patientLog): ?>
                <tr>
                    <td><?= $this->Number->format($patientLog->id) ?></td>
                    <td><?= h($patientLog->reviewed_by) ?></td>
                    <td><?= h($patientLog->called_by) ?></td>
                    <td><?= $patientLog->hasValue('exam') ? $this->Html->link($patientLog->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $patientLog->exam->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $patientLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientLog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>