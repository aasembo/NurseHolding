<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NursesPatient $nursesPatient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nurses Patient'), ['action' => 'edit', $nursesPatient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nurses Patient'), ['action' => 'delete', $nursesPatient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nursesPatient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nurses Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nurses Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nursesPatients view content">
            <h3><?= h($nursesPatient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nurse') ?></th>
                    <td><?= $nursesPatient->hasValue('nurse') ? $this->Html->link($nursesPatient->nurse->LastName, ['controller' => 'Nurses', 'action' => 'view', $nursesPatient->nurse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $nursesPatient->hasValue('patient') ? $this->Html->link($nursesPatient->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $nursesPatient->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nursesPatient->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>