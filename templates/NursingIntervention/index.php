<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NursingIntervention> $nursingIntervention
 */
?>
<div class="nursingIntervention index content">
    <?= $this->Html->link(__('New Nursing Intervention'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nursing Intervention') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('intervention_date') ?></th>
                    <th><?= $this->Paginator->sort('child_life') ?></th>
                    <th><?= $this->Paginator->sort('piv') ?></th>
                    <th><?= $this->Paginator->sort('picc_team') ?></th>
                    <th><?= $this->Paginator->sort('port_access') ?></th>
                    <th><?= $this->Paginator->sort('foley') ?></th>
                    <th><?= $this->Paginator->sort('circulating_monitoring') ?></th>
                    <th><?= $this->Paginator->sort('labs') ?></th>
                    <th><?= $this->Paginator->sort('ekg') ?></th>
                    <th><?= $this->Paginator->sort('meds') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nursingIntervention as $nursingIntervention): ?>
                <tr>
                    <td><?= $this->Number->format($nursingIntervention->id) ?></td>
                    <td><?= h($nursingIntervention->intervention_date) ?></td>
                    <td><?= h($nursingIntervention->child_life) ?></td>
                    <td><?= h($nursingIntervention->piv) ?></td>
                    <td><?= h($nursingIntervention->picc_team) ?></td>
                    <td><?= h($nursingIntervention->port_access) ?></td>
                    <td><?= h($nursingIntervention->foley) ?></td>
                    <td><?= h($nursingIntervention->circulating_monitoring) ?></td>
                    <td><?= h($nursingIntervention->labs) ?></td>
                    <td><?= h($nursingIntervention->ekg) ?></td>
                    <td><?= h($nursingIntervention->meds) ?></td>
                    <td><?= h($nursingIntervention->created_at) ?></td>
                    <td><?= h($nursingIntervention->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nursingIntervention->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nursingIntervention->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nursingIntervention->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nursingIntervention->id)]) ?>
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