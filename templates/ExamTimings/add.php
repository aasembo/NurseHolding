<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamTiming $examTiming
 * @var \Cake\Collection\CollectionInterface|string[] $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Exam Timings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examTimings form content">
            <?= $this->Form->create($examTiming) ?>
            <fieldset>
                <legend><?= __('Add Exam Timing') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
