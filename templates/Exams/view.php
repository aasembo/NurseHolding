<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exam'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exams'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exam'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exams view content">
            <h3><?= h($exam->exam_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $exam->hasValue('patient') ? $this->Html->link($exam->patient->FirstName, ['controller' => 'Patients', 'action' => 'view', $exam->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Exam Type') ?></th>
                    <td><?= h($exam->exam_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= $exam->hasValue('location') ? $this->Html->link($exam->location->name, ['controller' => 'Locations', 'action' => 'view', $exam->location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Scheduled Time') ?></th>
                    <td><?= $exam->hasValue('scheduled_time') ? $this->Html->link($exam->scheduled_time->id, ['controller' => 'ScheduledTimes', 'action' => 'view', $exam->scheduled_time->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($exam->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imaging Room') ?></th>
                    <td><?= $exam->hasValue('imaging_room') ? $this->Html->link($exam->imaging_room->room_name, ['controller' => 'ImagingRooms', 'action' => 'view', $exam->imaging_room->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Technician') ?></th>
                    <td><?= $exam->hasValue('technician') ? $this->Html->link($exam->technician->name, ['controller' => 'Technicians', 'action' => 'view', $exam->technician->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialist') ?></th>
                    <td><?= $exam->hasValue('specialist') ? $this->Html->link($exam->specialist->name, ['controller' => 'Specialists', 'action' => 'view', $exam->specialist->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exam->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($exam->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($exam->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Diagnosis') ?></h4>
                <?php if (!empty($exam->diagnosis)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Diagnosis Text') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->diagnosis as $diagnosi) : ?>
                        <tr>
                            <td><?= h($diagnosi->id) ?></td>
                            <td><?= h($diagnosi->exam_id) ?></td>
                            <td><?= h($diagnosi->diagnosis_text) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Diagnosis', 'action' => 'view', $diagnosi->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnosis', 'action' => 'edit', $diagnosi->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnosis', 'action' => 'delete', $diagnosi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosi->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Exam Status Updates') ?></h4>
                <?php if (!empty($exam->exam_status_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Event Type') ?></th>
                            <th><?= __('Timestamp') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->exam_status_updates as $examStatusUpdate) : ?>
                        <tr>
                            <td><?= h($examStatusUpdate->id) ?></td>
                            <td><?= h($examStatusUpdate->exam_id) ?></td>
                            <td><?= h($examStatusUpdate->event_type) ?></td>
                            <td><?= h($examStatusUpdate->timestamp) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExamStatusUpdates', 'action' => 'view', $examStatusUpdate->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExamStatusUpdates', 'action' => 'edit', $examStatusUpdate->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamStatusUpdates', 'action' => 'delete', $examStatusUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examStatusUpdate->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Exam Timings') ?></h4>
                <?php if (!empty($exam->exam_timings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->exam_timings as $examTiming) : ?>
                        <tr>
                            <td><?= h($examTiming->id) ?></td>
                            <td><?= h($examTiming->exam_id) ?></td>
                            <td><?= h($examTiming->start_time) ?></td>
                            <td><?= h($examTiming->end_time) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExamTimings', 'action' => 'view', $examTiming->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExamTimings', 'action' => 'edit', $examTiming->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamTimings', 'action' => 'delete', $examTiming->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examTiming->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Patient Logs') ?></h4>
                <?php if (!empty($exam->patient_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Reviewed By') ?></th>
                            <th><?= __('Called By') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->patient_logs as $patientLog) : ?>
                        <tr>
                            <td><?= h($patientLog->id) ?></td>
                            <td><?= h($patientLog->reviewed_by) ?></td>
                            <td><?= h($patientLog->called_by) ?></td>
                            <td><?= h($patientLog->comments) ?></td>
                            <td><?= h($patientLog->exam_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PatientLogs', 'action' => 'view', $patientLog->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PatientLogs', 'action' => 'edit', $patientLog->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientLogs', 'action' => 'delete', $patientLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientLog->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reporting') ?></h4>
                <?php if (!empty($exam->reporting)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Report Content') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->reporting as $reporting) : ?>
                        <tr>
                            <td><?= h($reporting->id) ?></td>
                            <td><?= h($reporting->exam_id) ?></td>
                            <td><?= h($reporting->report_content) ?></td>
                            <td><?= h($reporting->created_at) ?></td>
                            <td><?= h($reporting->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reporting', 'action' => 'view', $reporting->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reporting', 'action' => 'edit', $reporting->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reporting', 'action' => 'delete', $reporting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reporting->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sedations') ?></h4>
                <?php if (!empty($exam->sedations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Sedation Type') ?></th>
                            <th><?= __('Dose') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exam->sedations as $sedation) : ?>
                        <tr>
                            <td><?= h($sedation->id) ?></td>
                            <td><?= h($sedation->exam_id) ?></td>
                            <td><?= h($sedation->sedation_type) ?></td>
                            <td><?= h($sedation->dose) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sedations', 'action' => 'view', $sedation->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sedations', 'action' => 'edit', $sedation->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sedations', 'action' => 'delete', $sedation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sedation->id)]) ?>
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