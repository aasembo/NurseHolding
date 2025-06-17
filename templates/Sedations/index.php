<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sedation> $sedations
 */
?>
<div class="sedations management_table">
                            <div class="table_heading">
    <h1><?= __('Sedations') ?></h1>
    <?= $this->Html->link(__('New Sedation'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
                        <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('sedation_type') ?></th>
                    <th><?= $this->Paginator->sort('dose') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sedations as $sedation): ?>
                <tr>
                    <td><?= $this->Number->format($sedation->id) ?></td>
                    <td><?= $sedation->hasValue('exam') ? $this->Html->link($sedation->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $sedation->exam->id]) : '' ?></td>
                    <td><?= h($sedation->sedation_type) ?></td>
                    <td><?= $sedation->dose === null ? '' : $this->Number->format($sedation->dose) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $sedation->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $sedation->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $sedation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sedation->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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