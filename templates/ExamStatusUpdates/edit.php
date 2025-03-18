<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamStatusUpdate $examStatusUpdate
 * @var string[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examStatusUpdate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examStatusUpdate->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exam Status Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examStatusUpdates form content">
            <?= $this->Form->create($examStatusUpdate) ?>
            <fieldset>
                <legend><?= __('Edit Exam Status Update') ?></legend>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('event_type');
                    echo $this->Form->control('timestamp');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
