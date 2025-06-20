<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Specialist> $specialists
 */
?>
<div class="specialists index content">
    <div class="table_heading">
    <h3><?= __('Specialists') ?></h3>
    <?= $this->Html->link(__('New Specialist'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
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
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $specialist->id],['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $specialist->id],['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $specialist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialist->id),'class'=> 'bg-primary-light fa fa-trash']) ?>
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