<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\CareAssignmentsTable&\Cake\ORM\Association\HasMany $CareAssignments
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\HasMany $Exams
 * @property \App\Model\Table\NursingInterventionTable&\Cake\ORM\Association\HasMany $NursingIntervention
 * @property \App\Model\Table\PatientVisitsTable&\Cake\ORM\Association\HasMany $PatientVisits
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Patient> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Patient> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PatientsTable extends Table
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

        $this->setTable('patients');
        $this->setDisplayField('FirstName');
        $this->setPrimaryKey('id');

        $this->hasMany('CareAssignments', [
            'foreignKey' => 'patient_id',
        ]);
        $this->hasMany('Exams', [
            'foreignKey' => 'patient_id',
        ]);
        $this->hasMany('NursingIntervention', [
            'foreignKey' => 'patient_id',
        ]);
        $this->hasMany('PatientVisits', [
            'foreignKey' => 'patient_id',
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
            ->scalar('FirstName')
            ->maxLength('FirstName', 255)
            ->requirePresence('FirstName', 'create')
            ->notEmptyString('FirstName');

        $validator
            ->scalar('LastName')
            ->maxLength('LastName', 255)
            ->requirePresence('LastName', 'create')
            ->notEmptyString('LastName');

        $validator
            ->integer('age')
            ->allowEmptyString('age');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('medical_record_number')
            ->maxLength('medical_record_number', 255)
            ->requirePresence('medical_record_number', 'create')
            ->notEmptyString('medical_record_number')
            ->add('medical_record_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['medical_record_number']), ['errorField' => 'medical_record_number']);

        return $rules;
    }
}
