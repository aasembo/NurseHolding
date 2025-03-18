<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CareAssignments Model
 *
 * @property \App\Model\Table\NursesTable&\Cake\ORM\Association\BelongsTo $Nurses
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\CareAssignment newEmptyEntity()
 * @method \App\Model\Entity\CareAssignment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CareAssignment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CareAssignment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CareAssignment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CareAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CareAssignment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CareAssignment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CareAssignment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CareAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CareAssignment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CareAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CareAssignment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CareAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CareAssignment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CareAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CareAssignment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CareAssignmentsTable extends Table
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

        $this->setTable('care_assignments');
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

        $validator
            ->dateTime('assigned_date')
            ->allowEmptyDateTime('assigned_date');

        $validator
            ->scalar('comments')
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

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
