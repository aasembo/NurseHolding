<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CareAssignment> $careAssignments
 */
?>
<div class="careAssignments index content">
    <?= $this->Html->link(__('New Care Assignment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Care Assignments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
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
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $careAssignment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $careAssignment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $careAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id)]) ?>
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