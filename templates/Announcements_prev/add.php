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

                <?= $this->Form->control('department_id', [
                    'id' => 'department-id',
                    'label' => 'Select User',
                    'options' => $departmentUsers ?? [],
                    'empty' => 'Select user'
                ]) ?>

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const audienceType = document.getElementById('audience-type');
        const department = document.getElementById('department');
        const userSelect = document.getElementById('department-id');

        function fetchUsers(dep) {
            userSelect.innerHTML = '<option>Loading...</option>';
            fetch(`/announcements/get-users-by-department?department=${dep}`)
                .then(res => res.json())
                .then(data => {
                    userSelect.innerHTML = '<option value="">Select user</option>';
                    for (const [id, name] of Object.entries(data)) {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        userSelect.appendChild(option);
                    }
                })
                .catch(() => {
                    userSelect.innerHTML = '<option value="">Failed to load users</option>';
                });
        }

        department.addEventListener('change', function () {
            if (audienceType.value === 'individual' && department.value) {
                fetchUsers(department.value);
            }
        });

        // Preload if selected
        if (audienceType.value === 'individual' && department.value) {
            fetchUsers(department.value);
        }
    });
</script>
