<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Patient> $patients
 */
?>
<div class="patients index content">
    <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Patients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('LastName') ?></th>
                    <th><?= $this->Paginator->sort('FirstName') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('medical_record_number') ?></th>
                    <th><?= $this->Paginator->sort('OrderReviewedBy') ?></th>
                    <th><?= $this->Paginator->sort('PatientCalledBy') ?></th>
                    <th><?= $this->Paginator->sort('imaging_room_id') ?></th>
                    <th><?= $this->Paginator->sort('sedation_id') ?></th>
                    <th><?= $this->Paginator->sort('diagnosis_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $this->Number->format($patient->id) ?></td>
                    <td><?= h($patient->LastName) ?></td>
                    <td><?= h($patient->FirstName) ?></td>
                    <td><?= $patient->age === null ? '' : $this->Number->format($patient->age) ?></td>
                    <td><?= h($patient->gender) ?></td>
                    <td><?= h($patient->medical_record_number) ?></td>
                    <td><?= h($patient->OrderReviewedBy) ?></td>
                    <td><?= h($patient->PatientCalledBy) ?></td>
                    <td><?= $patient->hasValue('imaging_room') ? $this->Html->link($patient->imaging_room->room_name, ['controller' => 'ImagingRooms', 'action' => 'view', $patient->imaging_room->id]) : '' ?></td>
                    <td><?= $patient->hasValue('sedation') ? $this->Html->link($patient->sedation->id, ['controller' => 'Sedations', 'action' => 'view', $patient->sedation->id]) : '' ?></td>
                    <td><?= $patient->diagnosis_id === null ? '' : $this->Number->format($patient->diagnosis_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $patient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?>
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