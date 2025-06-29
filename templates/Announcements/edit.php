<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') ?>

<?php
// Convert department_ids to array for JS
$selectedDepartmentIds = is_array($announcement->department_ids)
    ? $announcement->department_ids
    : explode(',', (string)$announcement->department_ids);
?>

<script>
const preselectedUserIds = <?= json_encode(array_map('strval', $selectedDepartmentIds)) ?>;
</script>

<div class="announcements table_form">
    <?= $this->Form->create($announcement, ['type' => 'file']) ?>
    <?= $this->Form->control('announcement_name', ['label' => 'Announcement Name']) ?>
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

        <!-- 🔽 Department Field Wrapper -->
        <div id="department-group">
            <?= $this->Form->control('department', [
                'id' => 'department',
                'options' => $departments,
                'empty' => 'Select department',
                'label' => 'Select Department'
            ]) ?>
        </div>

        <!-- 🔽 User Multi-Select Wrapper -->
        <div id="users-group">
            <?= $this->Form->control('department_ids', [
                'id' => 'department-id',
                'label' => 'Select User(s)',
                'multiple' => true,
                'options' => $departmentUsers ?? [],
                'class' => 'select2-users'
            ]) ?>
        </div>

        <?php if (!empty($announcement->image_file)): ?>
            <div style="margin: 10px 0;">
                <label>Current Image:</label><br>
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
    const deptGroup = document.getElementById('department-group');
    const userGroup = document.getElementById('users-group');
    const userSelect = $('.select2-users');

    function updateVisibility() {
        const type = audienceType.value;

        if (type === 'all') {
            deptGroup.style.display = 'none';
            userGroup.style.display = 'none';
        } else if (type === 'department') {
            deptGroup.style.display = 'block';
            userGroup.style.display = 'none';
        } else if (type === 'individual') {
            deptGroup.style.display = 'block';

            if (department.value) {
                userGroup.style.display = 'block';
                fetchUsers(department.value, preselectedUserIds);
            } else {
                userGroup.style.display = 'none';
            }
        }
    }

    function fetchUsers(depId, preselected = []) {
        userSelect.empty().append('<option value="">Loading...</option>').trigger('change');

        fetch(`/announcements/get-users-by-department?department=${depId}`)
            .then(res => res.json())
            .then(data => {
                userSelect.empty();
                for (const [id, name] of Object.entries(data)) {
                    const isSelected = preselected.includes(String(id));
                    const option = new Option(name, id, isSelected, isSelected);
                    userSelect.append(option);
                }
                userSelect.trigger('change');
            })
            .catch(() => {
                userSelect.empty().append('<option value="">Failed to load users</option>').trigger('change');
            });
    }

    audienceType.addEventListener('change', updateVisibility);

    department.addEventListener('change', function () {
        if (audienceType.value === 'individual' && department.value) {
            userGroup.style.display = 'block';
            fetchUsers(department.value, preselectedUserIds);
        } else {
            userGroup.style.display = 'none';
            userSelect.empty().append('<option value="">Select user</option>').trigger('change');
        }
    });

    userSelect.select2({
        placeholder: 'Select user(s)',
        allowClear: true,
        width: '100%'
    });

    // On initial load
    updateVisibility();

    if (
        audienceType.value === 'individual' &&
        department.value &&
        preselectedUserIds.length > 0
    ) {
        userGroup.style.display = 'block';
        fetchUsers(department.value, preselectedUserIds);
    }
});
</script>
