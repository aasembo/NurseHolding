<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nurse'), ['action' => 'edit', $nurse->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nurse'), ['action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nurses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nurse'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="management_table">
                        <div class="table_heading">
            <h1><?= h($nurse->LastName) ?></h1>
            </div>
            <div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('LastName') ?></th>
                    <td><?= h($nurse->LastName) ?></td>
                </tr>
                <tr>
                    <th><?= __('FirstName') ?></th>
                    <td><?= h($nurse->FirstName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($nurse->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('VoalteNumber') ?></th>
                    <td><?= h($nurse->VoalteNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialty') ?></th>
                    <td><?= h($nurse->specialty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nurse->id) ?></td>
                </tr>
            </table>
            </div>
            <div class="">
                            <div class="table_heading">
                <h1><?= __(' Care Assignments') ?></h1>
                </div>
                <?php if (!empty($nurse->care_assignments)) : ?>
                <div class="table-responsive">
                    <table>
                        <thead class="thead-dark">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nurse Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Assigned Date') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($nurse->care_assignments as $careAssignment) : ?>
                        <tr>
                            <td><?= h($careAssignment->id) ?></td>
                            <td><?= h($careAssignment->nurse_id) ?></td>
                            <td><?= h($careAssignment->patient_id) ?></td>
                            <td><?= h($careAssignment->assigned_date) ?></td>
                            <td><?= h($careAssignment->comments) ?></td>
                            <td class="">
                                <?= $this->Html->link(__(''), ['controller' => 'CareAssignments', 'action' => 'view', $careAssignment->id], ['class'=> 'bg-primary-light fa fa-eye']); ?>
                                <?= $this->Html->link(__(''), ['controller' => 'CareAssignments', 'action' => 'edit', $careAssignment->id], ['class'=> 'bg-primary-light fa fa-edit']); ?>
                                <?= $this->Form->postLink(__(''), ['controller' => 'CareAssignments', 'action' => 'delete', $careAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id), 'class' => 'bg-primary-light fa fa-trash']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>