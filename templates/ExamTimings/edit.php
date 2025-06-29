<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamTiming $examTiming
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examTiming->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examTiming->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exam Timings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examTimings form content">
            <?= $this->Form->create($examTiming) ?>
            <fieldset>
                <h1><?= __('Edit Exam Timing') ?></h1>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
