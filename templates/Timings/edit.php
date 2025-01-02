<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timing $timing
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timing->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timing->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Timings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="timings form content">
            <?= $this->Form->create($timing) ?>
            <fieldset>
                <legend><?= __('Edit Timing') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                    echo $this->Form->control('HOLDING');
                    echo $this->Form->control('DISCHARGE');
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
