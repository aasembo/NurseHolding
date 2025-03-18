<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 * @var \Cake\Collection\CollectionInterface|string[] $locations
 * @var \Cake\Collection\CollectionInterface|string[] $scheduledTimes
 * @var \Cake\Collection\CollectionInterface|string[] $imagingRooms
 * @var \Cake\Collection\CollectionInterface|string[] $technicians
 * @var \Cake\Collection\CollectionInterface|string[] $specialists
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
                    echo $this->Form->control('scheduled_time_id', ['options' => $scheduledTimes, 'empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('imaging_room_id', ['options' => $imagingRooms, 'empty' => true]);
                    echo $this->Form->control('technician_id', ['options' => $technicians, 'empty' => true]);
                    echo $this->Form->control('specialist_id', ['options' => $specialists, 'empty' => true]);
                    echo $this->Form->control('sedations.0.sedation_type', ['label' => 'Sedation Type']);
                    echo $this->Form->control('sedations.0.dose', ['label' => 'Sedation Dose']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
