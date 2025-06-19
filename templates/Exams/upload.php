<div class="upload-files-container">
    <h1>Upload CSV or PDF File</h1>
    <div class="drag-file-area">
        <span class="material-icons-outlined upload-icon"> <i class="fa fa-upload" aria-hidden="true"></i> </span>
        <h3 class="dynamic-message"> Drag &amp; drop any file here </h3>
        <label class="label"> <span class="browse-files">
            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'csv-upload-form']) ?>
            <?= $this->Form->control('csv_file', [
                'type' => 'file',
                'label' => 'Choose a CSV file:',
                'required' => true,
            ]) ?>
             </span> 
        </label>
    </div>
    <div class="loader_btn">
        <div id="loader" style="display:none; text-align:center; margin-top:10px;">
            <i class="fa fa-spinner fa-spin fa-2x"></i>
            <p>Uploading...</p>
        </div>
        <?= $this->Form->button(__('Upload'), ['class' => 'themebtn m-auto', 'id' => 'upload-btn']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
document.getElementById('csv-upload-form').addEventListener('submit', function() {
    document.getElementById('loader').style.display = 'block';
});
</script>