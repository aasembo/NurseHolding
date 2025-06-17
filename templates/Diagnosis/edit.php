<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosi $diagnosi
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diagnosi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosi->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diagnosis'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="diagnosis form content">
            <?= $this->Form->create($diagnosi) ?>
            <fieldset>
                <h1><?= __('Edit Diagnosi') ?></h1>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('diagnosis_text');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
