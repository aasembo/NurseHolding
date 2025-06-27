<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 * @var array $departments
 * @var array $departmentUsers
 */
?>
<div class="row">
    <aside class="column column-20">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Announcements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcements form content">
            <?= $this->Form->create($announcement, ['type' => 'file']) ?>
            <fieldset>
                <h1><?= __('Add Announcement') ?></h1>

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

                <!-- 🔽 Department Selector -->
                <div id="department-group">
                    <?= $this->Form->control('department', [
                        'id' => 'department',
                        'options' => $departments,
                        'empty' => 'Select department',
                        'label' => 'Select Department'
                    ]) ?>
                </div>

                <!-- 🔽 User Multi-Select -->
                <div id="users-group">
                    <?= $this->Form->control('department_ids', [
                        'id' => 'department-id',
                        'label' => 'Select User(s)',
                        'multiple' => true,
                        'options' => $departmentUsers ?? [],
                        'class' => 'select2-users'
                    ]) ?>
                </div>

                <?= $this->Form->control('image_file', [
                    'type' => 'file',
                    'label' => 'Upload Image',
                    'accept' => 'image/*'
                ]) ?>

                <?= $this->Form->control('created_at', [
                    'empty' => true,
                    'label' => 'Created At'
                ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- ✅ Select2 CSS & JS -->
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') ?>

<!-- ✅ JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const audienceType = document.getElementById('audience-type');
    const department = document.getElementById('department');
    const deptGroup = document.getElementById('department-group');
    const userGroup = document.getElementById('users-group');

    function fetchUsers(depId) {
        $('.select2-users').empty().append('<option value="">Loading...</option>').trigger('change');
        fetch(`/announcements/get-users-by-department?department=${depId}`)
            .then(res => res.json())
            .then(data => {
                $('.select2-users').empty();
                for (const [id, name] of Object.entries(data)) {
                    const option = new Option(name, id, false, false);
                    $('.select2-users').append(option);
                }
                $('.select2-users').trigger('change');
            })
            .catch(() => {
                $('.select2-users').empty().append('<option value="">Failed to load users</option>').trigger('change');
            });
    }

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
                fetchUsers(department.value);
            } else {
                userGroup.style.display = 'none';
            }
        }
    }

    audienceType.addEventListener('change', updateVisibility);

    department.addEventListener('change', function () {
        if (audienceType.value === 'individual' && department.value) {
            userGroup.style.display = 'block';
            fetchUsers(department.value);
        } else {
            userGroup.style.display = 'none';
        }
    });

    $('.select2-users').select2({
        placeholder: 'Select user(s)',
        allowClear: true,
        width: '100%'
    });

    // Initial state (for edit mode or first load)
    updateVisibility();
});
</script>
