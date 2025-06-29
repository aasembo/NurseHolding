<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagingRoom $imagingRoom
 */
?>
<div class="row">
    <aside class="column  column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Imaging Rooms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagingRooms table_form">
            <?= $this->Form->create($imagingRoom) ?>
            <fieldset>
                <h1><?= __('Add Imaging Room') ?></h1>
                <?php
                    echo $this->Form->control('room_name');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
