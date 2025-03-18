<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reporting> $reporting
 */
?>
<div class="reporting index content">
    <?= $this->Html->link(__('New Reporting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reporting') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reporting as $reporting): ?>
                <tr>
                    <td><?= $this->Number->format($reporting->id) ?></td>
                    <td><?= $reporting->hasValue('exam') ? $this->Html->link($reporting->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $reporting->exam->id]) : '' ?></td>
                    <td><?= h($reporting->created_at) ?></td>
                    <td><?= h($reporting->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reporting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reporting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reporting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reporting->id)]) ?>
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