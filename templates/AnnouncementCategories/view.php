<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnnouncementCategory $announcementCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Announcement Category'), ['action' => 'edit', $announcementCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Announcement Category'), ['action' => 'delete', $announcementCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Announcement Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Announcement Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcementCategories view content">
            <h3><?= h($announcementCategory->category_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Announcement') ?></th>
                    <td><?= $announcementCategory->hasValue('announcement') ? $this->Html->link($announcementCategory->announcement->id, ['controller' => 'Announcements', 'action' => 'view', $announcementCategory->announcement->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($announcementCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($announcementCategory->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Category Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcementCategory->category_value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>