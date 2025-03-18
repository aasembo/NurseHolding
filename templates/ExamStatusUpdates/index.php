<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ExamStatusUpdate> $examStatusUpdates
 */
?>
<div class="examStatusUpdates index content">
    <?= $this->Html->link(__('New Exam Status Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exam Status Updates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('event_type') ?></th>
                    <th><?= $this->Paginator->sort('timestamp') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($examStatusUpdates as $examStatusUpdate): ?>
                <tr>
                    <td><?= $this->Number->format($examStatusUpdate->id) ?></td>
                    <td><?= $examStatusUpdate->hasValue('exam') ? $this->Html->link($examStatusUpdate->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $examStatusUpdate->exam->id]) : '' ?></td>
                    <td><?= h($examStatusUpdate->event_type) ?></td>
                    <td><?= h($examStatusUpdate->timestamp) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $examStatusUpdate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examStatusUpdate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examStatusUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examStatusUpdate->id)]) ?>
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