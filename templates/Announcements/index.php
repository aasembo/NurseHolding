<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Announcement> $announcements
 */
use Cake\ORM\TableRegistry;
?>
<div class="announcements management_table">
    <div class="table_heading">
        <h1><?= __('Announcements') ?></h1>
        <?= $this->Html->link(__('New Announcement'), ['action' => 'add'], ['class' => 'themebtn']) ?>
    </div>

    <div class="table-responsive">
        <table>
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= __('Image') ?></th>
                    <th><?= $this->Paginator->sort('content') ?></th>
                    <th><?= $this->Paginator->sort('audience_type', 'Audience') ?></th>
                    <th><?= __('Department') ?></th>
                    <th><?= __('User') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcements as $announcement): ?>
                <tr>
                    <td><?= $this->Number->format($announcement->id) ?></td>
                    <td>
                        <?php if (!empty($announcement->image_file)): ?>
                            <?= $this->Html->image($announcement->image_file, ['alt' => 'Announcement Image', 'width' => '50']) ?>
                        <?php else: ?>
                            <span>-</span>
                        <?php endif; ?>
                    </td>
                    <td><?= h($announcement->content) ?></td>
                    <td><?= h(ucfirst($announcement->audience_type)) ?></td>
                    <td><?= h($announcement->department ?? '-') ?></td>
                    <td>
                        <?php
                        if (
                            $announcement->audience_type === 'individual' &&
                            !empty($announcement->department) &&
                            !empty($announcement->department_ids)
                        ) {
                            try {
                                $department = $announcement->department; // e.g., 'nurses'
                                $tableName = ucfirst($department);       // e.g., 'Nurses'
                                $userTable = TableRegistry::getTableLocator()->get($tableName);

                                $ids = is_array($announcement->department_ids)
                                    ? $announcement->department_ids
                                    : explode(',', $announcement->department_ids);

                                $users = $userTable->find()
                                    ->where(['id IN' => $ids])
                                    ->all();

                                if ($users->isEmpty()) {
                                    echo 'User #' . h($announcement->department_ids);
                                } else {
                                    $names = [];
                                    foreach ($users as $user) {
                                        //debug($user);
                                        if($department == 'nurses'){
                                            $names[] = h($user->LastName ?? ('User #' . $user->LastName));
                                        }else{
                                            $names[] = h($user->name ?? ('User #' . $user->name));
                                        }
                                    }
                                    echo implode(', ', $names);
                                }
                            } catch (\Exception $e) {
                                echo 'User #' . h($announcement->department_ids);
                            }
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td><?= h($announcement->created_at) ?></td>
                    <td class="">
                        <?= $this->Html->link(__(''), ['action' => 'view', $announcement->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $announcement->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $announcement->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class'=> 'bg-primary-light fa fa-trash'
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<<') ?>
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('>>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
