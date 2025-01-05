<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nurses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nurses form content">
            <?= $this->Form->create($nurse) ?>
            <fieldset>
                <legend><?= __('Add Nurse') ?></legend>
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
