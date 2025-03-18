<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CareAssignment $careAssignment
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
                ['action' => 'delete', $careAssignment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Care Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="careAssignments form content">
            <?= $this->Form->create($careAssignment) ?>
            <fieldset>
                <legend><?= __('Edit Care Assignment') ?></legend>
                <?php
                    echo $this->Form->control('nurse_id', ['options' => $nurses]);
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                    echo $this->Form->control('assigned_date', ['empty' => true]);
                    echo $this->Form->control('comments');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
