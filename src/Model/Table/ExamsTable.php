<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exams Model
 *
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\ScheduledTimeTable&\Cake\ORM\Association\BelongsTo $ScheduledTime
 * @property \App\Model\Table\ImagingRoomsTable&\Cake\ORM\Association\BelongsTo $ImagingRooms
 * @property \App\Model\Table\DiagnosisTable&\Cake\ORM\Association\HasMany $Diagnosis
 * @property \App\Model\Table\ReportingTable&\Cake\ORM\Association\HasMany $Reporting
 * @property \App\Model\Table\SedationsTable&\Cake\ORM\Association\HasMany $Sedations
 * @property \App\Model\Table\TimingsTable&\Cake\ORM\Association\HasMany $Timings
 *
 * @method \App\Model\Entity\Exam newEmptyEntity()
 * @method \App\Model\Entity\Exam newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Exam> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exam get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Exam findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Exam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Exam> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exam|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Exam saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Exam>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exam>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exam>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exam> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exam>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exam>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exam>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exam> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExamsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

<<<<<<< HEAD
        $this->setTable('Exams');
=======
        $this->setTable('exams');
>>>>>>> main
        $this->setDisplayField('exam_type');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
        ]);
        $this->belongsTo('ScheduledTime', [
            'foreignKey' => 'scheduled_time_id',
        ]);
        $this->belongsTo('ImagingRooms', [
            'foreignKey' => 'imaging_room_id',
        ]);
        $this->hasMany('Diagnosis', [
            'foreignKey' => 'exam_id',
        ]);
        $this->hasMany('Reporting', [
            'foreignKey' => 'exam_id',
        ]);
        $this->hasMany('Sedations', [
            'foreignKey' => 'exam_id',
        ]);
        $this->hasMany('Timings', [
            'foreignKey' => 'exam_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('patient_id')
            ->allowEmptyString('patient_id');

        $validator
            ->scalar('exam_type')
            ->maxLength('exam_type', 255)
            ->requirePresence('exam_type', 'create')
            ->notEmptyString('exam_type');

        $validator
            ->integer('location_id')
            ->allowEmptyString('location_id');

        $validator
            ->integer('scheduled_time_id')
            ->allowEmptyString('scheduled_time_id');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->integer('imaging_room_id')
            ->allowEmptyString('imaging_room_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['patient_id'], 'Patients'), ['errorField' => 'patient_id']);
        $rules->add($rules->existsIn(['location_id'], 'Locations'), ['errorField' => 'location_id']);
        $rules->add($rules->existsIn(['scheduled_time_id'], 'ScheduledTime'), ['errorField' => 'scheduled_time_id']);
        $rules->add($rules->existsIn(['imaging_room_id'], 'ImagingRooms'), ['errorField' => 'imaging_room_id']);

        return $rules;
    }
}
