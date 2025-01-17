<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Diagnosi> $diagnosis
 */
?>
<div class="diagnosis index content">
    <?= $this->Html->link(__('New Diagnosi'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diagnosis') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diagnosis as $diagnosi): ?>
                <tr>
                    <td><?= $this->Number->format($diagnosi->id) ?></td>
                    <td><?= $diagnosi->hasValue('exam') ? $this->Html->link($diagnosi->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $diagnosi->exam->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diagnosi->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diagnosi->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diagnosi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosi->id)]) ?>
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