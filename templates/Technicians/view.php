<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technician $technician
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Technician'), ['action' => 'edit', $technician->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Technician'), ['action' => 'delete', $technician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $technician->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Technicians'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Technician'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="technicians view content">
            <h3><?= h($technician->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($technician->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($technician->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($technician->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialty') ?></th>
                    <td><?= h($technician->specialty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($technician->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Exams') ?></h4>
                <?php if (!empty($technician->exams)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Exam Type') ?></th>
                            <th><?= __('Location Id') ?></th>
                            <th><?= __('Scheduled Time Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Imaging Room Id') ?></th>
                            <th><?= __('Technician Id') ?></th>
                            <th><?= __('Specialist Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($technician->exams as $exam) : ?>
                        <tr>
                            <td><?= h($exam->id) ?></td>
                            <td><?= h($exam->patient_id) ?></td>
                            <td><?= h($exam->exam_type) ?></td>
                            <td><?= h($exam->location_id) ?></td>
                            <td><?= h($exam->scheduled_time_id) ?></td>
                            <td><?= h($exam->status) ?></td>
                            <td><?= h($exam->created_at) ?></td>
                            <td><?= h($exam->updated_at) ?></td>
                            <td><?= h($exam->imaging_room_id) ?></td>
                            <td><?= h($exam->technician_id) ?></td>
                            <td><?= h($exam->specialist_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Exams', 'action' => 'view', $exam->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Exams', 'action' => 'edit', $exam->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exams', 'action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>