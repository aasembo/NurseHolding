<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Exam> $exams
 */
?>
<div class="exams index content">
    <?= $this->Html->link(__('New Exam'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exams') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th><?= $this->Paginator->sort('exam_type') ?></th>
                    <th><?= $this->Paginator->sort('location_id') ?></th>
                    <th><?= $this->Paginator->sort('scheduled_time_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('imaging_room_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                <tr>
                    <td><?= $this->Number->format($exam->id) ?></td>
                    <td><?= $exam->hasValue('patient') ? $this->Html->link($exam->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $exam->patient->id]) : '' ?></td>
                    <td><?= h($exam->exam_type) ?></td>
                    <td><?= $exam->hasValue('location') ? $this->Html->link($exam->location->name, ['controller' => 'Locations', 'action' => 'view', $exam->location->id]) : '' ?></td>
                    <td><?= $exam->hasValue('scheduled_time') ? $this->Html->link($exam->scheduled_time->id, ['controller' => 'ScheduledTime', 'action' => 'view', $exam->scheduled_time->id]) : '' ?></td>
                    <td><?= h($exam->status) ?></td>
                    <td><?= h($exam->created_at) ?></td>
                    <td><?= h($exam->updated_at) ?></td>
                    <td><?= $exam->hasValue('imaging_room') ? $this->Html->link($exam->imaging_room->room_name, ['controller' => 'ImagingRooms', 'action' => 'view', $exam->imaging_room->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exam->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exam->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
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