<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PatientVisit $patientVisit
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient Visit'), ['action' => 'edit', $patientVisit->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient Visit'), ['action' => 'delete', $patientVisit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientVisit->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patient Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient Visit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patientVisits table_form">
            <h1><?= h($patientVisit->id) ?></h1>
            <table>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $patientVisit->hasValue('patient') ? $this->Html->link($patientVisit->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $patientVisit->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patientVisit->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Accession') ?></th>
                    <td><?= $patientVisit->accession === null ? '' : $this->Number->format($patientVisit->accession) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visit Number') ?></th>
                    <td><?= $patientVisit->visit_number === null ? '' : $this->Number->format($patientVisit->visit_number) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>