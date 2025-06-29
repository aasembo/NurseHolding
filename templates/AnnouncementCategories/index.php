<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AnnouncementCategory> $announcementCategories
 */
?>
<div class="announcementCategories management_table">
    <div class="table_heading">
            <h1><?= __('Announcement Categories') ?></h1>
    <?= $this->Html->link(__('New Announcement Category'), ['action' => 'add'], ['class' => 'themebtn']) ?>
</div>
    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
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
                    <td><?= h($announcementCategory->category_name) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $announcementCategory->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $announcementCategory->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $announcementCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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