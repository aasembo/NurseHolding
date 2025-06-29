<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technician $technician
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $technician->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $technician->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Technicians'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="technicians form content">
            <?= $this->Form->create($technician) ?>
            <fieldset>
                <h1><?= __('Edit Technician') ?></h1>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('specialty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
