<?= $this->Form->create(null, ['type' => 'file']) ?>
    <fieldset>
        <legend>Upload Exam CSV</legend>
        <?= $this->Form->control('csv_file', ['type' => 'file', 'label' => 'CSV File']) ?>
    </fieldset>
    <?= $this->Form->button(__('Upload')) ?>
<?= $this->Form->end() ?>
