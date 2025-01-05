<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 * @var string[]|\Cake\Collection\CollectionInterface $imagingRooms
 * @var string[]|\Cake\Collection\CollectionInterface $sedations
 * @var string[]|\Cake\Collection\CollectionInterface $nurses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patients form content">
            <?= $this->Form->create($patient) ?>
            <fieldset>
                <legend><?= __('Edit Patient') ?></legend>
                <?php
                    echo $this->Form->control('LastName');
                    echo $this->Form->control('FirstName');
                    echo $this->Form->control('age');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('medical_record_number');
                    echo $this->Form->control('OrderReviewedBy');
                    echo $this->Form->control('PatientCalledBy');
                    echo $this->Form->control('comments');
                    echo $this->Form->control('imaging_room_id', ['options' => $imagingRooms, 'empty' => true]);
                    echo $this->Form->control('sedation_id', ['options' => $sedations, 'empty' => true]);
                    echo $this->Form->control('diagnosis_id');
                    echo $this->Form->control('nurses._ids', ['options' => $nurses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
