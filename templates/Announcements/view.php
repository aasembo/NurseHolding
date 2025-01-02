<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Announcements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Announcement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcements view content">
            <h3><?= h($announcement->CallIn) ?></h3>
            <table>
                <tr>
                    <th><?= __('CallIn') ?></th>
                    <td><?= h($announcement->CallIn) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($announcement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($announcement->created_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('GoodCatches') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->GoodCatches)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->content)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Falls') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->Falls)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('ERS') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->ERS)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('KUDOS') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->KUDOS)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('EquipmentIssue') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->EquipmentIssue)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('SituationalAwareness') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($announcement->SituationalAwareness)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>