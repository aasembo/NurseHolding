<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 * @var string[]|\Cake\Collection\CollectionInterface $locations
 * @var string[]|\Cake\Collection\CollectionInterface $scheduledTimes
 * @var string[]|\Cake\Collection\CollectionInterface $imagingRooms
 * @var string[]|\Cake\Collection\CollectionInterface $technicians
 * @var string[]|\Cake\Collection\CollectionInterface $specialists
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exam->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exams'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exams form content">
            <?= $this->Form->create($exam) ?>
            <fieldset>
                <legend><?= __('Edit Exam') ?></legend>
                <?php
                    echo $this->Form->control('patient_id', ['options' => $patients, 'empty' => true]);
                    echo $this->Form->control('exam_type');
                    echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
                    echo $this->Form->control('scheduledTime', ['options' => $scheduledTimes, 'empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('imaging_room_id', ['options' => $imagingRooms, 'empty' => true]);
                    echo $this->Form->control('technician_id', ['options' => $technicians, 'empty' => true]);
                    echo $this->Form->control('specialist_id', ['options' => $specialists, 'empty' => true]);

                    echo '<h4>Sedation Details</h4>';
                 echo $this->Form->control('sedations.0.sedation_type', [
                        'label' => 'Sedation Type',
                        'value' => $exam->sedations[0]->sedation_type ?? '', // Show current sedation
                 ]);
                   echo $this->Form->control('sedations.0.dose', [
                        'label' => 'Dose',
                        'value' => $exam->sedations[0]->dose ?? '', // Show current sedation
                   ]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
