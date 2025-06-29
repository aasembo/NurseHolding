<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagingRoom $imagingRoom
 */
?>
<div class="row">
    <aside class="column  column-20"">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Imaging Room'), ['action' => 'edit', $imagingRoom->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Imaging Room'), ['action' => 'delete', $imagingRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagingRoom->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Imaging Rooms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Imaging Room'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagingRooms management_table">
            <div class="table_heading">
            <h1><?= h($imagingRoom->room_name) ?></h1>
</div>
<div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('Room Name') ?></th>
                    <td><?= h($imagingRoom->room_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imagingRoom->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($imagingRoom->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($imagingRoom->updated_at) ?></td>
                </tr>
            </table>
</div>
            <div class="">
                <div class="table_heading">
                <h1><?= __('Related Exams') ?></h1>
</div>
                <?php if (!empty($imagingRoom->exams)) : ?>
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
                        <?php foreach ($imagingRoom->exams as $exam) : ?>
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
                            <td class="">
                                <?= $this->Html->link(__(''), ['controller' => 'Exams', 'action' => 'view', $exam->id], ['class'=> 'bg-primary-light fa fa-eye']) ?>
                                <?= $this->Html->link(__(''), ['controller' => 'Exams', 'action' => 'edit', $exam->id], ['class'=> 'bg-primary-light fa fa-edit']) ?>
                                <?= $this->Form->postLink(__(''), ['controller' => 'Exams', 'action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class'=> 'bg-primary-light fa fa-trash']) ?>
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