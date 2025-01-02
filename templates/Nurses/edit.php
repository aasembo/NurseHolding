<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nurse->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Nurses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nurses form content">
            <?= $this->Form->create($nurse) ?>
            <fieldset>
                <legend><?= __('Edit Nurse') ?></legend>
                <?php
                    echo $this->Form->control('LastName');
                    echo $this->Form->control('FirstName');
                    echo $this->Form->control('email');
                    echo $this->Form->control('VoalteNumber');
                    echo $this->Form->control('specialty');
                    echo $this->Form->control('patients._ids', ['options' => $patients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
