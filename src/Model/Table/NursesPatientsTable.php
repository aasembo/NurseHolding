<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NursesPatients Model
 *
 * @property \App\Model\Table\NursesTable&\Cake\ORM\Association\BelongsTo $Nurses
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\NursesPatient newEmptyEntity()
 * @method \App\Model\Entity\NursesPatient newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\NursesPatient> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NursesPatient get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\NursesPatient findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\NursesPatient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\NursesPatient> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NursesPatient|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\NursesPatient saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\NursesPatient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursesPatient>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursesPatient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursesPatient> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursesPatient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursesPatient>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursesPatient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursesPatient> deleteManyOrFail(iterable $entities, array $options = [])
 */
class NursesPatientsTable extends Table
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

        $this->setTable('nurses_patients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Nurses', [
            'foreignKey' => 'nurse_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER',
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
            ->integer('nurse_id')
            ->notEmptyString('nurse_id');

        $validator
            ->integer('patient_id')
            ->notEmptyString('patient_id');

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
        $rules->add($rules->existsIn(['nurse_id'], 'Nurses'), ['errorField' => 'nurse_id']);
        $rules->add($rules->existsIn(['patient_id'], 'Patients'), ['errorField' => 'patient_id']);

        return $rules;
    }
}
