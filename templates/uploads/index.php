<?= $this->Form->create(null, ['type' => 'file']) ?>
    <fieldset>
        <h1>Upload Exam CSV</h1>
        <?= $this->Form->control('csv_file', ['type' => 'file', 'label' => 'CSV File']) ?>
    </fieldset>
    <?= $this->Form->button(__('Upload')) ?>
<?= $this->Form->end() ?>
