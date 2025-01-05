<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patients view content">
            <h3><?= h($patient->LastName) ?></h3>
            <table>
                <tr>
                    <th><?= __('LastName') ?></th>
                    <td><?= h($patient->LastName) ?></td>
                </tr>
                <tr>
                    <th><?= __('FirstName') ?></th>
                    <td><?= h($patient->FirstName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($patient->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Medical Record Number') ?></th>
                    <td><?= h($patient->medical_record_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('OrderReviewedBy') ?></th>
                    <td><?= h($patient->OrderReviewedBy) ?></td>
                </tr>
                <tr>
                    <th><?= __('PatientCalledBy') ?></th>
                    <td><?= h($patient->PatientCalledBy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imaging Room') ?></th>
                    <td><?= $patient->hasValue('imaging_room') ? $this->Html->link($patient->imaging_room->room_name, ['controller' => 'ImagingRooms', 'action' => 'view', $patient->imaging_room->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sedation') ?></th>
                    <td><?= $patient->hasValue('sedation') ? $this->Html->link($patient->sedation->id, ['controller' => 'Sedations', 'action' => 'view', $patient->sedation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $patient->age === null ? '' : $this->Number->format($patient->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diagnosis Id') ?></th>
                    <td><?= $patient->diagnosis_id === null ? '' : $this->Number->format($patient->diagnosis_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comments') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($patient->comments)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Nurses') ?></h4>
                <?php if (!empty($patient->nurses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('LastName') ?></th>
                            <th><?= __('FirstName') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('VoalteNumber') ?></th>
                            <th><?= __('Specialty') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->nurses as $nurse) : ?>
                        <tr>
                            <td><?= h($nurse->id) ?></td>
                            <td><?= h($nurse->LastName) ?></td>
                            <td><?= h($nurse->FirstName) ?></td>
                            <td><?= h($nurse->email) ?></td>
                            <td><?= h($nurse->VoalteNumber) ?></td>
                            <td><?= h($nurse->specialty) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Nurses', 'action' => 'view', $nurse->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Nurses', 'action' => 'edit', $nurse->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nurses', 'action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Exams') ?></h4>
                <?php if (!empty($patient->exams)) : ?>
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
                        <?php foreach ($patient->exams as $exam) : ?>
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
                <h4><?= __('Related Timings') ?></h4>
                <?php if (!empty($patient->timings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('HOLDING') ?></th>
                            <th><?= __('DISCHARGE') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->timings as $timing) : ?>
                        <tr>
                            <td><?= h($timing->id) ?></td>
                            <td><?= h($timing->exam_id) ?></td>
                            <td><?= h($timing->start_time) ?></td>
                            <td><?= h($timing->end_time) ?></td>
                            <td><?= h($timing->HOLDING) ?></td>
                            <td><?= h($timing->DISCHARGE) ?></td>
                            <td><?= h($timing->patient_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Timings', 'action' => 'view', $timing->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Timings', 'action' => 'edit', $timing->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Timings', 'action' => 'delete', $timing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timing->id)]) ?>
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