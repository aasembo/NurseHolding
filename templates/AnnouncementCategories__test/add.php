<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnnouncementCategory $announcementCategory
 * @var \Cake\Collection\CollectionInterface|string[] $announcements
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Announcement Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcementCategories form content">
            <?= $this->Form->create($announcementCategory) ?>
            <fieldset>
                <h1><?= __('Add Announcement Category') ?></h1>
                <?php
                    echo $this->Form->control('category_name');
                    echo $this->Form->control('category_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
