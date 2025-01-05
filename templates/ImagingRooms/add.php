<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagingRoom $imagingRoom
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Imaging Rooms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagingRooms form content">
            <?= $this->Form->create($imagingRoom) ?>
            <fieldset>
                <legend><?= __('Add Imaging Room') ?></legend>
                <?php
                    echo $this->Form->control('room_name');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
