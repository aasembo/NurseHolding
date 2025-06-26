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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $announcement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Announcements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="announcements form content">
            <?= $this->Form->create($announcement, ['type' => 'file']) ?>
            <fieldset>
                <h1><?= __('Edit Announcement') ?></h1>

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

                <?php if (!empty($announcement->image_file)): ?>
                    <div style="margin: 10px 0;">
                        <strong>Current Image:</strong><br>
                        <img src="<?= $this->Url->image($announcement->image_file) ?>" alt="Uploaded Image" width="150" />
                    </div>
                <?php endif; ?>

                <?= $this->Form->control('image_file', [
                    'type' => 'file',
                    'label' => 'Replace Image',
                    'accept' => 'image/*'
                ]) ?>

                <?= $this->Form->control('created_at', ['empty' => true, 'label' => 'Created At']) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=> 'btn']) ?>
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

        if (audienceType.value === 'individual' && department.value) {
            fetchUsers(department.value);
        }
    });
</script>
