<!-- templates/Announcements/edit.php -->
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') ?>

<div class="announcements form content">
    <?= $this->Form->create($announcement, ['type' => 'file']) ?>
    <fieldset>
        <h1><?= __('Edit Announcement') ?></h1>

        <?= $this->Form->control('content', ['label' => 'Announcement Content']) ?>

        <?= $this->Form->control('category_id', [
            'label' => 'Category',
            'options' => $announcementCategories,
            'empty' => 'Select category'
        ]) ?>

        <?= $this->Form->control('audience_type', [
            'id' => 'audience-type',
            'options' => [
                'all' => 'All Users',
                'department' => 'Specific Department',
                'individual' => 'Single User'
            ],
            'label' => 'Send To'
        ]) ?>

        <?= $this->Form->control('department', [
            'id' => 'department',
            'options' => $departments,
            'empty' => 'Select department',
            'label' => 'Select Department'
        ]) ?>

        <?= $this->Form->control('department_ids', [
            'id' => 'department-id',
            'label' => 'Select User(s)',
            'multiple' => true,
            'options' => $departmentUsers ?? [],
            'class' => 'select2-users'
        ]) ?>

        <?php if (!empty($announcement->image_file)): ?>
            <div style="margin: 10px 0;">
                <strong>Current Image:</strong><br>
                <img src="<?= $this->Url->image($announcement->image_file) ?>" width="150" />
            </div>
        <?php endif; ?>

        <?= $this->Form->control('image_file', [
            'type' => 'file',
            'label' => 'Replace Image',
            'accept' => 'image/*'
        ]) ?>

        <?= $this->Form->control('created_at', ['empty' => true, 'label' => 'Created At']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const audienceType = document.getElementById('audience-type');
    const department = document.getElementById('department');
    const userSelect = $('.select2-users');

    function resetDropdowns() {
        department.selectedIndex = 0;
        userSelect.empty().append('<option value="">Select user</option>').trigger('change');
    }

    function fetchUsers(dep) {
        const selectedValues = userSelect.val() || [];
        userSelect.empty().append('<option>Loading...</option>').trigger('change');

        fetch(`/announcements/get-users-by-department?department=${dep}`)
            .then(res => res.json())
            .then(data => {
                userSelect.empty();
                for (const [id, name] of Object.entries(data)) {
                    const isSelected = selectedValues.includes(id);
                    const option = new Option(name, id, isSelected, isSelected);
                    userSelect.append(option);
                }
                userSelect.trigger('change');
            })
            .catch(() => {
                userSelect.empty().append('<option value="">Failed to load users</option>').trigger('change');
            });
    }

    department.addEventListener('change', function () {
        if (audienceType.value === 'individual' && department.value) {
            fetchUsers(department.value);
        } else {
            userSelect.empty().append('<option value="">Select user</option>').trigger('change');
        }
    });

    audienceType.addEventListener('change', function () {
        if (audienceType.value === 'all') {
            resetDropdowns();
        } else if (audienceType.value === 'department') {
            userSelect.empty().append('<option value="">Select user</option>').trigger('change');
        } else if (audienceType.value === 'individual' && department.value) {
            fetchUsers(department.value);
        }
    });

    // ✅ Preload if selected and values are present
    if (audienceType.value === 'individual' && department.value && userSelect.find('option').length <= 1) {
        fetchUsers(department.value);
    }

    // ✅ Initialize Select2
    userSelect.select2({
        placeholder: 'Select user(s)',
        allowClear: true,
        width: '100%'
    });
});
</script>
