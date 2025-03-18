<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialists Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\HasMany $Exams
 *
 * @method \App\Model\Entity\Specialist newEmptyEntity()
 * @method \App\Model\Entity\Specialist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Specialist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Specialist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Specialist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Specialist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Specialist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Specialist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Specialist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Specialist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Specialist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Specialist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Specialist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Specialist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Specialist> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SpecialistsTable extends Table
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

        $this->setTable('specialists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Exams', [
            'foreignKey' => 'specialist_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmptyString('phone');

        $validator
            ->scalar('specialty')
            ->maxLength('specialty', 255)
            ->allowEmptyString('specialty');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
