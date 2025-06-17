<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CareAssignment> $careAssignments
 */
?>
<div class="careAssignments management_table">
    <div class="table_heading">
            <h1><?= __('Care Assignments') ?></h1>
    <?= $this->Html->link(__('New Care Assignment'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nurse_id') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th><?= $this->Paginator->sort('assigned_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($careAssignments as $careAssignment): ?>
                <tr>
                    <td><?= $this->Number->format($careAssignment->id) ?></td>
                    <td><?= $careAssignment->hasValue('nurse') ? $this->Html->link($careAssignment->nurse->LastName, ['controller' => 'Nurses', 'action' => 'view', $careAssignment->nurse->id]) : '' ?></td>
                    <td><?= $careAssignment->hasValue('patient') ? $this->Html->link($careAssignment->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $careAssignment->patient->id]) : '' ?></td>
                    <td><?= h($careAssignment->assigned_date) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $careAssignment->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $careAssignment->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $careAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id),'class'=> 'bg-primary-light fa fa-trash']) ?>
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