<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nurses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nurses table_form">
            <?= $this->Form->create($nurse) ?>
            <fieldset>
                <h1><?= __('Add Nurse') ?></h1>
                <?php
                    echo $this->Form->control('LastName');
                    echo $this->Form->control('FirstName');
                    echo $this->Form->control('email');
                    echo $this->Form->control('VoalteNumber');
                    echo $this->Form->control('specialty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
