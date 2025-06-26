<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamStatusUpdates Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\BelongsTo $Exams
 *
 * @method \App\Model\Entity\ExamStatusUpdate newEmptyEntity()
 * @method \App\Model\Entity\ExamStatusUpdate newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ExamStatusUpdate> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamStatusUpdate get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ExamStatusUpdate findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ExamStatusUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ExamStatusUpdate> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamStatusUpdate|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ExamStatusUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ExamStatusUpdate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamStatusUpdate>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamStatusUpdate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamStatusUpdate> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamStatusUpdate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamStatusUpdate>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamStatusUpdate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamStatusUpdate> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExamStatusUpdatesTable extends Table
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

        $this->setTable('exam_status_updates');
        $this->setDisplayField('event_type');
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
            ->integer('exam_id')
            ->notEmptyString('exam_id');

        $validator
            ->scalar('event_type')
            ->requirePresence('event_type', 'create')
            ->notEmptyString('event_type');

        $validator
            ->dateTime('timestamp')
            ->requirePresence('timestamp', 'create')
            ->notEmptyDateTime('timestamp');

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
