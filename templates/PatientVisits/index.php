<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PatientVisit> $patientVisits
 */
?>
<div class="patientVisits management_table">
                            <div class="table_heading">
    <h1><?= __('Patient Visits') ?></h1>
    <?= $this->Html->link(__('New Patient Visit'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
                        <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th><?= $this->Paginator->sort('accession') ?></th>
                    <th><?= $this->Paginator->sort('visit_number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patientVisits as $patientVisit): ?>
                <tr>
                    <td><?= $this->Number->format($patientVisit->id) ?></td>
                    <td><?= $patientVisit->hasValue('patient') ? $this->Html->link($patientVisit->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $patientVisit->patient->id]) : '' ?></td>
                    <td><?= $patientVisit->accession === null ? '' : $this->Number->format($patientVisit->accession) ?></td>
                    <td><?= $patientVisit->visit_number === null ? '' : $this->Number->format($patientVisit->visit_number) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $patientVisit->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $patientVisit->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $patientVisit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientVisit->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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