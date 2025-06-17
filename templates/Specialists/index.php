<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Specialist> $specialists
 */
?>
<div class="specialists index content">
    <?= $this->Html->link(__('New Specialist'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    <h3><?= __('Specialists') ?></h3>
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
                <?php foreach ($specialists as $specialist): ?>
                <tr>
                    <td><?= $this->Number->format($specialist->id) ?></td>
                    <td><?= h($specialist->name) ?></td>
                    <td><?= h($specialist->email) ?></td>
                    <td><?= h($specialist->phone) ?></td>
                    <td><?= h($specialist->specialty) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $specialist->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specialist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialist->id)]) ?>
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