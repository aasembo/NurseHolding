<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialist $specialist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialist->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Specialists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="specialists form content">
            <?= $this->Form->create($specialist) ?>
            <fieldset>
                <h1><?= __('Edit Specialist') ?></h1>
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
