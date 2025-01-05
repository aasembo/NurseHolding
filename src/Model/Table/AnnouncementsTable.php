<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Announcements Model
 *
 * @method \App\Model\Entity\Announcement newEmptyEntity()
 * @method \App\Model\Entity\Announcement newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Announcement> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Announcement get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Announcement findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Announcement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Announcement> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Announcement|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Announcement saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Announcement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Announcement>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Announcement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Announcement> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Announcement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Announcement>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Announcement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Announcement> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AnnouncementsTable extends Table
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

        $this->setTable('announcements');
        $this->setDisplayField('CallIn');
        $this->setPrimaryKey('id');
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
            ->scalar('CallIn')
            ->maxLength('CallIn', 500)
            ->requirePresence('CallIn', 'create')
            ->notEmptyString('CallIn');

        $validator
            ->scalar('GoodCatches')
            ->requirePresence('GoodCatches', 'create')
            ->notEmptyString('GoodCatches');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->scalar('Falls')
            ->requirePresence('Falls', 'create')
            ->notEmptyString('Falls');

        $validator
            ->scalar('ERS')
            ->requirePresence('ERS', 'create')
            ->notEmptyString('ERS');

        $validator
            ->scalar('KUDOS')
            ->requirePresence('KUDOS', 'create')
            ->notEmptyString('KUDOS');

        $validator
            ->scalar('EquipmentIssue')
            ->requirePresence('EquipmentIssue', 'create')
            ->notEmptyString('EquipmentIssue');

        $validator
            ->scalar('SituationalAwareness')
            ->requirePresence('SituationalAwareness', 'create')
            ->notEmptyString('SituationalAwareness');

        $validator
            ->allowEmptyFile('image');

        return $validator;
    }
}
