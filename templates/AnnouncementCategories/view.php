<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnnouncementCategory $announcementCategory
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Announcement Category'), ['action' => 'edit', $announcementCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Announcement Category'), ['action' => 'delete', $announcementCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Announcement Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Announcement Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcementCategories management_table">
            <div class="table_heading">
                            <h1><?= h($announcementCategory->category_name) ?></h1>
</div>
<div class="table-responsive">
            <table>
 
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($announcementCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($announcementCategory->id) ?></td>
                </tr>
            </table>
</div>
            <div class="text p-4">
                <label><?= __('Category Value') ?></label>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcementCategory->category_value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>