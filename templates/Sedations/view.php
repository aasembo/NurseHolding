<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sedation $sedation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sedation'), ['action' => 'edit', $sedation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sedation'), ['action' => 'delete', $sedation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sedation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sedations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sedation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sedations view content">
            <h3><?= h($sedation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $sedation->hasValue('exam') ? $this->Html->link($sedation->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $sedation->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sedation Type') ?></th>
                    <td><?= h($sedation->sedation_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sedation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dose') ?></th>
                    <td><?= $sedation->dose === null ? '' : $this->Number->format($sedation->dose) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>