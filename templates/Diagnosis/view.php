<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosi $diagnosi
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diagnosi'), ['action' => 'edit', $diagnosi->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diagnosi'), ['action' => 'delete', $diagnosi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosi->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diagnosis'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diagnosi'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="diagnosis view content">
            <h3><?= h($diagnosi->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $diagnosi->hasValue('exam') ? $this->Html->link($diagnosi->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $diagnosi->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diagnosi->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Diagnosis Text') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($diagnosi->diagnosis_text)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>