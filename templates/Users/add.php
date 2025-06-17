<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item fa fa-user']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="table_form">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <h1><?= __('Add User') ?></h1>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('role');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn'], ['class' => 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
