<h1>Upload CSV File</h1>

<?= $this->Form->create(null, ['type' => 'file']) ?>
    <div class="form-group">
        <?= $this->Form->control('csv_file', [
            'type' => 'file',
            'label' => 'Choose a CSV file:',
            'required' => true,
        ]) ?>
    </div>
    <?= $this->Form->button(__('Upload'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
