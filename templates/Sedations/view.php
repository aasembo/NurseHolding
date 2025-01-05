<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sedation $sedation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sedation'), ['action' => 'edit', $sedation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sedation'), ['action' => 'delete', $sedation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sedation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sedations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sedation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sedations view content">
            <h3><?= h($sedation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exam') ?></th>
                    <td><?= $sedation->hasValue('exam') ? $this->Html->link($sedation->exam->exam_type, ['controller' => 'Exams', 'action' => 'view', $sedation->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sedation Type') ?></th>
                    <td><?= h($sedation->sedation_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sedation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dose') ?></th>
                    <td><?= $sedation->dose === null ? '' : $this->Number->format($sedation->dose) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Patients') ?></h4>
                <?php if (!empty($sedation->patients)) : ?>
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
                        <?php foreach ($sedation->patients as $patient) : ?>
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