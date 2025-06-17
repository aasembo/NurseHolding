<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Nurse> $nurses
 */
?>
<div class="nurses management_table">
    <div class="table_heading">
        <h1><?= __('Nurses') ?></h1>
    <?= $this->Html->link(__('New Nurse'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
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
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $nurse->id], options:['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $nurse->id], options:['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id), 'class' => 'bg-primary-light fa fa-trash']) ?>
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