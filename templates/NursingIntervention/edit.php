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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nursingIntervention->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nursingIntervention->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Nursing Intervention'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nursingIntervention form content">
            <?= $this->Form->create($nursingIntervention) ?>
            <fieldset>
                <legend><?= __('Edit Nursing Intervention') ?></legend>
                <?php
                    echo $this->Form->control('intervention_date');
                    echo $this->Form->control('child_life');
                    echo $this->Form->control('piv');
                    echo $this->Form->control('picc_team');
                    echo $this->Form->control('port_access');
                    echo $this->Form->control('foley');
                    echo $this->Form->control('circulating_monitoring');
                    echo $this->Form->control('labs');
                    echo $this->Form->control('ekg');
                    echo $this->Form->control('meds');
                    echo $this->Form->control('comments');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
