<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagingRoom $imagingRoom
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Imaging Room'), ['action' => 'edit', $imagingRoom->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Imaging Room'), ['action' => 'delete', $imagingRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagingRoom->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Imaging Rooms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Imaging Room'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagingRooms view content">
            <h3><?= h($imagingRoom->room_name) ?></h3>
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
            <div class="related">
                <h4><?= __('Related Exams') ?></h4>
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
            <div class="related">
                <h4><?= __('Related Patients') ?></h4>
                <?php if (!empty($imagingRoom->patients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('LastName') ?></th>
                            <th><?= __('FirstName') ?></th>
                            <th><?= __('Age') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Medical Record Number') ?></th>
                            <th><?= __('OrderReviewedBy') ?></th>
                            <th><?= __('PatientCalledBy') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Imaging Room Id') ?></th>
                            <th><?= __('Sedation Id') ?></th>
                            <th><?= __('Diagnosis Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($imagingRoom->patients as $patient) : ?>
                        <tr>
                            <td><?= h($patient->id) ?></td>
                            <td><?= h($patient->LastName) ?></td>
                            <td><?= h($patient->FirstName) ?></td>
                            <td><?= h($patient->age) ?></td>
                            <td><?= h($patient->gender) ?></td>
                            <td><?= h($patient->medical_record_number) ?></td>
                            <td><?= h($patient->OrderReviewedBy) ?></td>
                            <td><?= h($patient->PatientCalledBy) ?></td>
                            <td><?= h($patient->comments) ?></td>
                            <td><?= h($patient->imaging_room_id) ?></td>
                            <td><?= h($patient->sedation_id) ?></td>
                            <td><?= h($patient->diagnosis_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patient->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?>
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