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
            <h3><?= h($patient->FirstName) ?></h3>
            <table>
                <tr>
                    <th><?= __('FirstName') ?></th>
                    <td><?= h($patient->FirstName) ?></td>
                </tr>
                <tr>
                    <th><?= __('LastName') ?></th>
                    <td><?= h($patient->LastName) ?></td>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $patient->age === null ? '' : $this->Number->format($patient->age) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Care Assignments') ?></h4>
                <?php if (!empty($patient->care_assignments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nurse Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Assigned Date') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->care_assignments as $careAssignment) : ?>
                        <tr>
                            <td><?= h($careAssignment->id) ?></td>
                            <td><?= h($careAssignment->nurse_id) ?></td>
                            <td><?= h($careAssignment->patient_id) ?></td>
                            <td><?= h($careAssignment->assigned_date) ?></td>
                            <td><?= h($careAssignment->comments) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CareAssignments', 'action' => 'view', $careAssignment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CareAssignments', 'action' => 'edit', $careAssignment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CareAssignments', 'action' => 'delete', $careAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careAssignment->id)]) ?>
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
                            <th><?= __('Technician Id') ?></th>
                            <th><?= __('Specialist Id') ?></th>
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
            <div class="related">
                <h4><?= __('Related Nursing Intervention') ?></h4>
                <?php if (!empty($patient->nursing_intervention)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Intervention Date') ?></th>
                            <th><?= __('Child Life') ?></th>
                            <th><?= __('Piv') ?></th>
                            <th><?= __('Picc Team') ?></th>
                            <th><?= __('Port Access') ?></th>
                            <th><?= __('Foley') ?></th>
                            <th><?= __('Circulating Monitoring') ?></th>
                            <th><?= __('Labs') ?></th>
                            <th><?= __('Ekg') ?></th>
                            <th><?= __('Meds') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->nursing_intervention as $nursingIntervention) : ?>
                        <tr>
                            <td><?= h($nursingIntervention->id) ?></td>
                            <td><?= h($nursingIntervention->patient_id) ?></td>
                            <td><?= h($nursingIntervention->intervention_date) ?></td>
                            <td><?= h($nursingIntervention->child_life) ?></td>
                            <td><?= h($nursingIntervention->piv) ?></td>
                            <td><?= h($nursingIntervention->picc_team) ?></td>
                            <td><?= h($nursingIntervention->port_access) ?></td>
                            <td><?= h($nursingIntervention->foley) ?></td>
                            <td><?= h($nursingIntervention->circulating_monitoring) ?></td>
                            <td><?= h($nursingIntervention->labs) ?></td>
                            <td><?= h($nursingIntervention->ekg) ?></td>
                            <td><?= h($nursingIntervention->meds) ?></td>
                            <td><?= h($nursingIntervention->comments) ?></td>
                            <td><?= h($nursingIntervention->created_at) ?></td>
                            <td><?= h($nursingIntervention->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'NursingIntervention', 'action' => 'view', $nursingIntervention->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'NursingIntervention', 'action' => 'edit', $nursingIntervention->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'NursingIntervention', 'action' => 'delete', $nursingIntervention->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nursingIntervention->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Patient Visits') ?></h4>
                <?php if (!empty($patient->patient_visits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Accession') ?></th>
                            <th><?= __('Visit Number') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->patient_visits as $patientVisit) : ?>
                        <tr>
                            <td><?= h($patientVisit->id) ?></td>
                            <td><?= h($patientVisit->patient_id) ?></td>
                            <td><?= h($patientVisit->accession) ?></td>
                            <td><?= h($patientVisit->visit_number) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PatientVisits', 'action' => 'view', $patientVisit->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PatientVisits', 'action' => 'edit', $patientVisit->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientVisits', 'action' => 'delete', $patientVisit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientVisit->id)]) ?>
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