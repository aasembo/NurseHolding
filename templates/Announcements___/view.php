<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Announcements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Announcement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcements view content">
            <h3><?= h($announcement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($announcement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($announcement->created_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->content)); ?>
                </blockquote>
            </div>
            <div class="">
                <h4><?= __('Related Announcement Categories') ?></h4>
                <?php if (!empty($announcement->announcement_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Category Name') ?></th>
                            <th><?= __('Category Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($announcement->announcement_categories as $announcementCategory) : ?>
                        <tr>
                            <td><?= h($announcementCategory->id) ?></td>
                            <td><?= h($announcementCategory->category_name) ?></td>
                            <td><?= h($announcementCategory->category_value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AnnouncementCategories', 'action' => 'view', $announcementCategory->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AnnouncementCategories', 'action' => 'edit', $announcementCategory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AnnouncementCategories', 'action' => 'delete', $announcementCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>