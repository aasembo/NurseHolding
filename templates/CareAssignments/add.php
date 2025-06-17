<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CareAssignment $careAssignment
 * @var \Cake\Collection\CollectionInterface|string[] $nurses
 * @var \Cake\Collection\CollectionInterface|string[] $patients
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Care Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="careAssignments table_form">
            <?= $this->Form->create($careAssignment) ?>
            <fieldset>
                <h1><?= __('Add Care Assignment') ?></h1>
                <?php
                    echo $this->Form->control('nurse_id', ['options' => $nurses]);
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                    echo $this->Form->control('assigned_date', ['empty' => true]);
                    echo $this->Form->control('comments');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
