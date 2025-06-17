<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CareAssignment $careAssignment
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Care Assignment'), ['action' => 'edit', $careAssignment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Care Assignment'), ['action' => 'delete', $careAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Care Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Care Assignment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="careAssignments management_table">
            <div class="table_heading">
            <h1><?= h($careAssignment->id) ?></h1>
            </div>
            <div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('Nurse') ?></th>
                    <td><?= $careAssignment->hasValue('nurse') ? $this->Html->link($careAssignment->nurse->LastName, ['controller' => 'Nurses', 'action' => 'view', $careAssignment->nurse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $careAssignment->hasValue('patient') ? $this->Html->link($careAssignment->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $careAssignment->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($careAssignment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned Date') ?></th>
                    <td><?= h($careAssignment->assigned_date) ?></td>
                </tr>
            </table>
            </div>
            <div class="comment_quote">
                <label><?= __('Comments') ?></label>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($careAssignment->comments)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>