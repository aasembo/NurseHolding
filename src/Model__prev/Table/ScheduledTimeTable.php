<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScheduledTime Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\HasMany $Exams
 *
 * @method \App\Model\Entity\ScheduledTime newEmptyEntity()
 * @method \App\Model\Entity\ScheduledTime newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ScheduledTime> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScheduledTime get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ScheduledTime findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ScheduledTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ScheduledTime> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScheduledTime|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ScheduledTime saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ScheduledTime>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScheduledTime>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScheduledTime>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScheduledTime> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScheduledTime>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScheduledTime>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScheduledTime>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScheduledTime> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ScheduledTimeTable extends Table
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

        $this->setTable('scheduled_time');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Exams', [
            'foreignKey' => 'scheduled_time_id',
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
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyDateTime('end_time');

        return $validator;
    }
}
