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
                        if ($announcement->audience_type === 'individual' && $announcement->department && $announcement->department_id) {
                            try {
                                $table = TableRegistry::getTableLocator()->get(ucfirst($announcement->department));
                                $user = $table->get($announcement->department_id);
                                echo h($user->name ?? 'User #' . $announcement->department_id);
                            } catch (\Exception $e) {
                                echo 'User #' . h($announcement->department_id);
                            }
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td><?= h($announcement->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $announcement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)
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
