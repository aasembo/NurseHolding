<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Technician> $technicians
 */
?>
<div class="technicians index content">
    <?= $this->Html->link(__('New Technician'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Technicians') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('specialty') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($technicians as $technician): ?>
                <tr>
                    <td><?= $this->Number->format($technician->id) ?></td>
                    <td><?= h($technician->name) ?></td>
                    <td><?= h($technician->email) ?></td>
                    <td><?= h($technician->phone) ?></td>
                    <td><?= h($technician->specialty) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $technician->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $technician->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $technician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $technician->id)]) ?>
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