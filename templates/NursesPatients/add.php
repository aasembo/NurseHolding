<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NursesPatient $nursesPatient
 * @var \Cake\Collection\CollectionInterface|string[] $nurses
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nurses Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nursesPatients form content">
            <?= $this->Form->create($nursesPatient) ?>
            <fieldset>
                <legend><?= __('Add Nurses Patient') ?></legend>
                <?php
                    echo $this->Form->control('nurse_id', ['options' => $nurses]);
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
