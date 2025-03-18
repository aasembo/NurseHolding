<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnnouncementCategory $announcementCategory
 * @var string[]|\Cake\Collection\CollectionInterface $announcements
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $announcementCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $announcementCategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Announcement Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcementCategories form content">
            <?= $this->Form->create($announcementCategory) ?>
            <fieldset>
                <legend><?= __('Edit Announcement Category') ?></legend>
                <?php
                    echo $this->Form->control('announcement_id', ['options' => $announcements]);
                    echo $this->Form->control('category_name');
                    echo $this->Form->control('category_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
