<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Radiologist $radiologist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $radiologist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $radiologist->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Radiologists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="radiologists form content">
            <?= $this->Form->create($radiologist) ?>
            <fieldset>
                <legend><?= __('Edit Radiologist') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('specialty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
