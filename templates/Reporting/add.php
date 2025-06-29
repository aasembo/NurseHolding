<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reporting $reporting
 * @var \Cake\Collection\CollectionInterface|string[] $exams
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reporting'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reporting form content">
            <?= $this->Form->create($reporting) ?>
            <fieldset>
                <h1><?= __('Add Reporting') ?></h1>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('report_content');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
