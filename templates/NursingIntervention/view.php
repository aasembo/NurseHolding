<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NursingIntervention $nursingIntervention
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nursing Intervention'), ['action' => 'edit', $nursingIntervention->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nursing Intervention'), ['action' => 'delete', $nursingIntervention->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nursingIntervention->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nursing Intervention'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nursing Intervention'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nursingIntervention view content">
            <h3><?= h($nursingIntervention->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nursingIntervention->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Intervention Date') ?></th>
                    <td><?= h($nursingIntervention->intervention_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($nursingIntervention->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($nursingIntervention->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Child Life') ?></th>
                    <td><?= $nursingIntervention->child_life ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Piv') ?></th>
                    <td><?= $nursingIntervention->piv ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Picc Team') ?></th>
                    <td><?= $nursingIntervention->picc_team ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Port Access') ?></th>
                    <td><?= $nursingIntervention->port_access ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Foley') ?></th>
                    <td><?= $nursingIntervention->foley ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Circulating Monitoring') ?></th>
                    <td><?= $nursingIntervention->circulating_monitoring ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Labs') ?></th>
                    <td><?= $nursingIntervention->labs ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Ekg') ?></th>
                    <td><?= $nursingIntervention->ekg ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Meds') ?></th>
                    <td><?= $nursingIntervention->meds ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comments') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($nursingIntervention->comments)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>