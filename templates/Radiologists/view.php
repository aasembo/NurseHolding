<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Radiologist $radiologist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Radiologist'), ['action' => 'edit', $radiologist->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Radiologist'), ['action' => 'delete', $radiologist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radiologist->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Radiologists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Radiologist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="radiologists view content">
            <h3><?= h($radiologist->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($radiologist->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($radiologist->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($radiologist->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialty') ?></th>
                    <td><?= h($radiologist->specialty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($radiologist->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>