<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Patient> $patients
 */
?>
<div class="patients management_table">
    <div class="table_heading">
            <h1><?= __('Patients') ?></h1>
    <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('FirstName') ?></th>
                    <th><?= $this->Paginator->sort('LastName') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('medical_record_number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $this->Number->format($patient->id) ?></td>
                    <td><?= h($patient->FirstName) ?></td>
                    <td><?= h($patient->LastName) ?></td>
                    <td><?= $patient->age === null ? '' : $this->Number->format($patient->age) ?></td>
                    <td><?= h($patient->gender) ?></td>
                    <td><?= h($patient->medical_record_number) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $patient->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $patient->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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