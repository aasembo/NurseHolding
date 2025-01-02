<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NursingIntervention Model
 *
 * @method \App\Model\Entity\NursingIntervention newEmptyEntity()
 * @method \App\Model\Entity\NursingIntervention newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\NursingIntervention> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NursingIntervention get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\NursingIntervention findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\NursingIntervention patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\NursingIntervention> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NursingIntervention|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\NursingIntervention saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\NursingIntervention>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursingIntervention>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursingIntervention>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursingIntervention> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursingIntervention>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursingIntervention>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\NursingIntervention>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\NursingIntervention> deleteManyOrFail(iterable $entities, array $options = [])
 */
class NursingInterventionTable extends Table
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

        $this->setTable('nursing_intervention');
        $this->setDisplayField('id');
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
            ->date('intervention_date')
            ->requirePresence('intervention_date', 'create')
            ->notEmptyDate('intervention_date');

        $validator
            ->boolean('child_life')
            ->allowEmptyString('child_life');

        $validator
            ->boolean('piv')
            ->allowEmptyString('piv');

        $validator
            ->boolean('picc_team')
            ->allowEmptyString('picc_team');

        $validator
            ->boolean('port_access')
            ->allowEmptyString('port_access');

        $validator
            ->boolean('foley')
            ->allowEmptyString('foley');

        $validator
            ->boolean('circulating_monitoring')
            ->allowEmptyString('circulating_monitoring');

        $validator
            ->boolean('labs')
            ->allowEmptyString('labs');

        $validator
            ->boolean('ekg')
            ->allowEmptyString('ekg');

        $validator
            ->boolean('meds')
            ->allowEmptyString('meds');

        $validator
            ->scalar('comments')
            ->allowEmptyString('comments');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}
