<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientLogs Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\BelongsTo $Exams
 *
 * @method \App\Model\Entity\PatientLog newEmptyEntity()
 * @method \App\Model\Entity\PatientLog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PatientLog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientLog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PatientLog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PatientLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PatientLog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientLog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PatientLog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PatientLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PatientLog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PatientLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PatientLog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PatientLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PatientLog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PatientLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PatientLog> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PatientLogsTable extends Table
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

        $this->setTable('patient_logs');
        $this->setDisplayField('reviewed_by');
        $this->setPrimaryKey('id');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
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
            ->scalar('reviewed_by')
            ->maxLength('reviewed_by', 255)
            ->requirePresence('reviewed_by', 'create')
            ->notEmptyString('reviewed_by');

        $validator
            ->scalar('called_by')
            ->maxLength('called_by', 255)
            ->requirePresence('called_by', 'create')
            ->notEmptyString('called_by');

        $validator
            ->scalar('comments')
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        $validator
            ->integer('exam_id')
            ->notEmptyString('exam_id');

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
        $rules->add($rules->existsIn(['exam_id'], 'Exams'), ['errorField' => 'exam_id']);

        return $rules;
    }
}
