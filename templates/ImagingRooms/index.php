<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ImagingRoom> $imagingRooms
 */
?>
<div class="imagingRooms management_table">
    <div class="table_heading">
            <h1><?= __('Imaging Rooms') ?></h1>
    <?= $this->Html->link(__('New Imaging Room'), ['action' => 'add'], ['class' => 'themebtn']) ?>
</div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('room_name') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imagingRooms as $imagingRoom): ?>
                <tr>
                    <td><?= $this->Number->format($imagingRoom->id) ?></td>
                    <td><?= h($imagingRoom->room_name) ?></td>
                    <td><?= h($imagingRoom->created_at) ?></td>
                    <td><?= h($imagingRoom->updated_at) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $imagingRoom->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $imagingRoom->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $imagingRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagingRoom->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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