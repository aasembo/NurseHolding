<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Exam> $exams
 */
?>
<div class="exams management_table">
    <div class="table_heading">
            <h1><?= __('Exams') ?></h1>
    <?= $this->Html->link(__('New Exam'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
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
                    <th><?= $this->Paginator->sort('technician_id') ?></th>
                    <th><?= $this->Paginator->sort('specialist_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                <tr>
                    <td><?= $this->Number->format($exam->id) ?></td>
                    <td><?= $exam->hasValue('patient') ? $this->Html->link($exam->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $exam->patient->id]) : '' ?></td>
                    <td><?= h($exam->exam_type) ?></td>
                    <td><?= $exam->hasValue('location') ? $this->Html->link($exam->location->name, ['controller' => 'Locations', 'action' => 'view', $exam->location->id]) : '' ?></td>
                    <td><?= $exam->hasValue('scheduled_time') ? $this->Html->link($exam->scheduled_time->id, ['controller' => 'ScheduledTimes', 'action' => 'view', $exam->scheduled_time->id]) : '' ?></td>
                    <td><?= h($exam->status) ?></td>
                    <td><?= h($exam->created_at) ?></td>
                    <td><?= h($exam->updated_at) ?></td>
                    <td><?= $exam->hasValue('imaging_room') ? $this->Html->link($exam->imaging_room->room_name, ['controller' => 'ImagingRooms', 'action' => 'view', $exam->imaging_room->id]) : '' ?></td>
                    <td><?= $exam->hasValue('technician') ? $this->Html->link($exam->technician->name, ['controller' => 'Technicians', 'action' => 'view', $exam->technician->id]) : '' ?></td>
                    <td><?= $exam->hasValue('specialist') ? $this->Html->link($exam->specialist->name, ['controller' => 'Specialists', 'action' => 'view', $exam->specialist->id]) : '' ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $exam->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $exam->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id),'class'=> 'bg-primary-light fa fa-trash']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('')) ?>
            <?= $this->Paginator->prev('< ' . __('')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('') . ' >') ?>
            <?= $this->Paginator->last(__('') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>