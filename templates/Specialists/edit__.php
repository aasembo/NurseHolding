<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialist $specialist
 */
?>
<div class="row">
    <aside class="column column-20">
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
        <div class="specialists form content table_form">
            <?= $this->Form->create($specialist) ?>
            <fieldset>
                <h1><?= __('Edit Specialist') ?></h1>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('specialty');
                 // Toggle checkbox
                    echo $this->Form->control('show_dob', [
                        'type' => 'checkbox',
                        'label' => 'Edit Date of Birth',
                        'id' => 'toggleDob',
                        'checked' => !empty($specialist->dob), // checked if DOB is already present
                        'value' => 1
                    ]);
                ?>

                <!-- DOB input field -->
                <div id="dobField" style="display: <?= !empty($specialist->dob) ? 'block' : 'none' ?>;">
                    <?= $this->Form->control('dob', [
                        'type' => 'date',
                        'label' => 'Date of Birth',
                        'value' => $specialist->dob ? $specialist->dob->format('Y-m-d') : ''
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
