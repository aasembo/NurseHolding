<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sedation $sedation
 * @var \Cake\Collection\CollectionInterface|string[] $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sedations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sedations form content">
            <?= $this->Form->create($sedation) ?>
            <fieldset>
                <legend><?= __('Add Sedation') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('sedation_type');
                    echo $this->Form->control('dose');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
