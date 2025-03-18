<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PatientVisit> $patientVisits
 */
?>
<div class="patientVisits index content">
    <?= $this->Html->link(__('New Patient Visit'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Patient Visits') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
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
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $patientVisit->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientVisit->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientVisit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientVisit->id)]) ?>
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