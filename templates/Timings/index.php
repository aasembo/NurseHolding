<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Timing> $timings
 */
?>
<div class="timings index content">
    <?= $this->Html->link(__('New Timing'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Timings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th><?= $this->Paginator->sort('HOLDING') ?></th>
                    <th><?= $this->Paginator->sort('DISCHARGE') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($timings as $timing): ?>
                <tr>
                    <td><?= $this->Number->format($timing->id) ?></td>
                    <td><?= $timing->hasValue('exam') ? $this->Html->link($timing->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $timing->exam->id]) : '' ?></td>
                    <td><?= h($timing->start_time) ?></td>
                    <td><?= h($timing->end_time) ?></td>
                    <td><?= h($timing->HOLDING) ?></td>
                    <td><?= h($timing->DISCHARGE) ?></td>
                    <td><?= $timing->hasValue('patient') ? $this->Html->link($timing->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $timing->patient->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $timing->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timing->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timing->id)]) ?>
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