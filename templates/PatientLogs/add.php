<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PatientLog $patientLog
 * @var \Cake\Collection\CollectionInterface|string[] $exams
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Patient Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patientLogs form content">
            <?= $this->Form->create($patientLog) ?>
            <fieldset>
                <h1><?= __('Add Patient Log') ?></h1>
                <?php
                    echo $this->Form->control('reviewed_by');
                    echo $this->Form->control('called_by');
                    echo $this->Form->control('comments');
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
