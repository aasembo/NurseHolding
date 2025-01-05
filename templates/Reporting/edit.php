<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reporting $reporting
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reporting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reporting->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reporting'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reporting form content">
            <?= $this->Form->create($reporting) ?>
            <fieldset>
                <legend><?= __('Edit Reporting') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('report_content');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
