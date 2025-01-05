<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledTime $scheduledTime
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Scheduled Time'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scheduledTime form content">
            <?= $this->Form->create($scheduledTime) ?>
            <fieldset>
                <legend><?= __('Add Scheduled Time') ?></legend>
                <?php
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
