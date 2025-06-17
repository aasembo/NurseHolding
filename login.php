<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Patient> $patients
 */
?>
<div class="patients index content">
    <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    <h3><?= __('Patients') ?></h3>
    <div class="table-responsive">
    <h2>Login</h2>
<?= $this->Form->create() ?>
    <?= $this->Form->control('username', ['label' => 'Username']) ?>
    <?= $this->Form->control('password', ['label' => 'Password']) ?>
    <?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

<p>Don't have an account? <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']) ?>">Register here</a></p>

    
</div>