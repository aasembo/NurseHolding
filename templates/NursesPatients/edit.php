<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NursesPatient $nursesPatient
 * @var string[]|\Cake\Collection\CollectionInterface $nurses
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nursesPatient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nursesPatient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Nurses Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nursesPatients form content">
            <?= $this->Form->create($nursesPatient) ?>
            <fieldset>
                <legend><?= __('Edit Nurses Patient') ?></legend>
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
