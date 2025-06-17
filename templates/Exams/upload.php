<div class="upload-files-container">
    <h1>Upload CSV File</h1>
    <div class="drag-file-area">
        <span class="material-icons-outlined upload-icon"> <i class="fa fa-upload" aria-hidden="true"></i> </span>
        <h3 class="dynamic-message"> Drag &amp; drop any file here </h3>
        <label class="label"> <span class="browse-files">
            <?= $this->Form->create(null, ['type' => 'file']) ?>
            <?= $this->Form->control('csv_file', [
                'type' => 'file',
                'label' => 'Choose a CSV file:',
                'required' => true,
            ]) ?>
             </span> </label>
      
        <?= $this->Form->button(__('Upload'), ['class' => 'themebtn m-auto']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>