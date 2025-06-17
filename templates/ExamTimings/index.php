<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ExamTiming> $examTimings
 */
?>
<div class="examTimings index content">
    <?= $this->Html->link(__('New Exam Timing'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    <h3><?= __('Exam Timings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($examTimings as $examTiming): ?>
                <tr>
                    <td><?= $this->Number->format($examTiming->id) ?></td>
                    <td><?= $examTiming->hasValue('exam') ? $this->Html->link($examTiming->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $examTiming->exam->id]) : '' ?></td>
                    <td><?= h($examTiming->start_time) ?></td>
                    <td><?= h($examTiming->end_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $examTiming->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examTiming->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examTiming->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examTiming->id)]) ?>
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