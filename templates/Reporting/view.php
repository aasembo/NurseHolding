<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reporting $reporting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reporting'), ['action' => 'edit', $reporting->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reporting'), ['action' => 'delete', $reporting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reporting->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reporting'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reporting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reporting view content">
            <h3><?= h($reporting->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $reporting->hasValue('exam') ? $this->Html->link($reporting->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $reporting->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reporting->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($reporting->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($reporting->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Report Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reporting->report_content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>