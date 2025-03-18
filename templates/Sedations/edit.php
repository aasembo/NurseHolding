<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sedation $sedation
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sedation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sedation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sedations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sedations form content">
            <?= $this->Form->create($sedation) ?>
            <fieldset>
                <legend><?= __('Edit Sedation') ?></legend>
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
