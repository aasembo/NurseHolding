<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 * @var \Cake\Collection\CollectionInterface|string[] $locations
 * @var \Cake\Collection\CollectionInterface|string[] $scheduledTime
 * @var \Cake\Collection\CollectionInterface|string[] $imagingRooms
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Exams'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exams form content">
            <?= $this->Form->create($exam) ?>
            <fieldset>
                <legend><?= __('Add Exam') ?></legend>
                <?php
                    echo $this->Form->control('patient_id', ['options' => $patients, 'empty' => true]);
                    echo $this->Form->control('exam_type');
                    echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
                    echo $this->Form->control('scheduled_time_id', ['options' => $scheduledTime, 'empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('imaging_room_id', ['options' => $imagingRooms, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>