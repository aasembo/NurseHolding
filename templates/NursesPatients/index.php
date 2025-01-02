<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NursesPatient> $nursesPatients
 */
?>
<div class="nursesPatients index content">
    <?= $this->Html->link(__('New Nurses Patient'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nurses Patients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nurse_id') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nursesPatients as $nursesPatient): ?>
                <tr>
                    <td><?= $this->Number->format($nursesPatient->id) ?></td>
                    <td><?= $nursesPatient->hasValue('nurse') ? $this->Html->link($nursesPatient->nurse->LastName, ['controller' => 'Nurses', 'action' => 'view', $nursesPatient->nurse->id]) : '' ?></td>
                    <td><?= $nursesPatient->hasValue('patient') ? $this->Html->link($nursesPatient->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $nursesPatient->patient->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nursesPatient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nursesPatient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nursesPatient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nursesPatient->id)]) ?>
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