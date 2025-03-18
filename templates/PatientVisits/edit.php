<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PatientVisit $patientVisit
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientVisit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientVisit->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Patient Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patientVisits form content">
            <?= $this->Form->create($patientVisit) ?>
            <fieldset>
                <legend><?= __('Edit Patient Visit') ?></legend>
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
