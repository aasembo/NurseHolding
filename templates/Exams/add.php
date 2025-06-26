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
<!-- Select2 CSS and JS -->
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') ?>

<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Exams'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exams table_form">
            <?= $this->Form->create($exam) ?>
            <fieldset>
                <h1><?= __('Add Exam') ?></h1>
                <?php
                    echo $this->Form->control('patient_id', [
                        'options' => $patients,
                        'empty' => true,
                        'class' => 'select2'
                    ]);
                    echo $this->Form->control('exam_type');
                    echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
                    echo $this->Form->control('scheduled_time_id', ['options' => $scheduledTimes, 'empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('imaging_room_id', [
                        'options' => $imagingRooms,
                        'empty' => true,
                        'class' => 'select2'
                    ]);

                    echo $this->Form->control('technician_id', [
                        'options' => $technicians,
                        'empty' => true,
                        'class' => 'select2'
                    ]);

                    echo $this->Form->control('specialist_id', [
                        'options' => $specialists,
                        'empty' => true,
                        'class' => 'select2'
                    ]);
                    echo $this->Form->control('sedations.0.sedation_type', ['label' => 'Sedation Type']);
                    echo $this->Form->control('sedations.0.dose', ['label' => 'Sedation Dose']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true,
        width: '100%'
    });
});
</script>
