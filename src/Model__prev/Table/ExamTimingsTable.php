<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamTimings Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\BelongsTo $Exams
 *
 * @method \App\Model\Entity\ExamTiming newEmptyEntity()
 * @method \App\Model\Entity\ExamTiming newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ExamTiming> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamTiming get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ExamTiming findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ExamTiming patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ExamTiming> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamTiming|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ExamTiming saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ExamTiming>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamTiming>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamTiming>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamTiming> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamTiming>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamTiming>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExamTiming>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExamTiming> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExamTimingsTable extends Table
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

        $this->setTable('exam_timings');
        $this->setDisplayField('id');
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
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyDateTime('end_time');

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
