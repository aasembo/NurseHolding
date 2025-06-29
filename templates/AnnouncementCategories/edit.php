<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnnouncementCategory $announcementCategory
 * @var string[]|\Cake\Collection\CollectionInterface $announcements
 */
?>
<div class="row">
    <aside class="column column-20">
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
        <div class="announcementCategories table_form">
            <?= $this->Form->create($announcementCategory) ?>
            <fieldset>
                <h1><?= __('Edit Announcement Category') ?></h1>
                <?php
                    echo $this->Form->control('category_name');
                    //echo $this->Form->control('category_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
