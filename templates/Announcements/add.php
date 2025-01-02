<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Announcements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcements form content">
            <?= $this->Form->create($announcement) ?>
            <fieldset>
                <legend><?= __('Add Announcement') ?></legend>
                <?php
                    echo $this->Form->control('CallIn');
                    echo $this->Form->control('GoodCatches');
                    echo $this->Form->control('content');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('Falls');
                    echo $this->Form->control('ERS');
                    echo $this->Form->control('KUDOS');
                    echo $this->Form->control('EquipmentIssue');
                    echo $this->Form->control('SituationalAwareness');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
