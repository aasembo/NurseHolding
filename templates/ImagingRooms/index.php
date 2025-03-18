<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ImagingRoom> $imagingRooms
 */
?>
<div class="imagingRooms index content">
    <?= $this->Html->link(__('New Imaging Room'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Imaging Rooms') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
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
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imagingRoom->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagingRoom->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagingRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagingRoom->id)]) ?>
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