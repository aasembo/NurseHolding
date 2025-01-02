<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Nurse> $nurses
 */
?>
<div class="nurses index content">
    <?= $this->Html->link(__('New Nurse'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nurses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('LastName') ?></th>
                    <th><?= $this->Paginator->sort('FirstName') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('VoalteNumber') ?></th>
                    <th><?= $this->Paginator->sort('specialty') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nurses as $nurse): ?>
                <tr>
                    <td><?= $this->Number->format($nurse->id) ?></td>
                    <td><?= h($nurse->LastName) ?></td>
                    <td><?= h($nurse->FirstName) ?></td>
                    <td><?= h($nurse->email) ?></td>
                    <td><?= h($nurse->VoalteNumber) ?></td>
                    <td><?= h($nurse->specialty) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nurse->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nurse->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id)]) ?>
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