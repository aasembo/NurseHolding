<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosi $diagnosi
 * @var \Cake\Collection\CollectionInterface|string[] $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diagnosis'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="diagnosis form content">
            <?= $this->Form->create($diagnosi) ?>
            <fieldset>
                <legend><?= __('Add Diagnosi') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('diagnosis_text');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
