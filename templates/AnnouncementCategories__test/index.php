<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AnnouncementCategory> $announcementCategories
 */
?>
<div class="announcementCategories index content">
    <?= $this->Html->link(__('New Announcement Category'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    <h3><?= __('Announcement Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcementCategories as $announcementCategory): ?>
                <tr>
                    <td><?= $this->Number->format($announcementCategory->id) ?></td>
                    <td><?= $announcementCategory->hasValue('announcement') ? $this->Html->link($announcementCategory->announcement->id, ['controller' => 'Announcements', 'action' => 'view', $announcementCategory->announcement->id]) : '' ?></td>
                    <td><?= h($announcementCategory->category_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $announcementCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcementCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcementCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id)]) ?>
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