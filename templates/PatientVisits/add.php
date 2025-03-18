<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PatientVisit $patientVisit
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Patient Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patientVisits form content">
            <?= $this->Form->create($patientVisit) ?>
            <fieldset>
                <legend><?= __('Add Patient Visit') ?></legend>
                <?php
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                    echo $this->Form->control('accession');
                    echo $this->Form->control('visit_number');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
