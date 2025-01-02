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
                    <td><?= $exam->hasValue('patient') ? $this->Html->link($exam->patient->LastName, ['controller' => 'Patients', 'action' => 'view', $exam->patient->id]) : '' ?></td>
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
                    <td><?= $exam->hasValue('scheduled_time') ? $this->Html->link($exam->scheduled_time->id, ['controller' => 'ScheduledTime', 'action' => 'view', $exam->scheduled_time->id]) : '' ?></td>
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
            <div class="related">
                <h4><?= __('Related Timings') ?></h4>
                <?php if (!empty($exam->timings)) : ?>
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
                        <?php foreach ($exam->timings as $timing) : ?>
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