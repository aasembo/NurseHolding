<?= $this->Form->create(null, ['type' => 'file']) ?>
    <?= $this->Form->control('csv_file', ['type' => 'file']) ?>
    <?= $this->Form->button('Upload CSV') ?>
<?= $this->Form->end() ?>
