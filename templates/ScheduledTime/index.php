<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ScheduledTime> $scheduledTime
 */
?>
<div class="scheduledTime index content">
    <?= $this->Html->link(__('New Scheduled Time'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Scheduled Time') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scheduledTime as $scheduledTime): ?>
                <tr>
                    <td><?= $this->Number->format($scheduledTime->id) ?></td>
                    <td><?= h($scheduledTime->start_time) ?></td>
                    <td><?= h($scheduledTime->end_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $scheduledTime->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheduledTime->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheduledTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledTime->id)]) ?>
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