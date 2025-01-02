<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sedations Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\BelongsTo $Exams
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\HasMany $Patients
 *
 * @method \App\Model\Entity\Sedation newEmptyEntity()
 * @method \App\Model\Entity\Sedation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Sedation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sedation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Sedation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Sedation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Sedation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sedation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Sedation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Sedation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sedation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sedation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sedation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sedation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sedation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sedation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sedation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SedationsTable extends Table
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

        $this->setTable('sedations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'sedation_id',
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
            ->scalar('sedation_type')
            ->maxLength('sedation_type', 255)
            ->allowEmptyString('sedation_type');

        $validator
            ->numeric('dose')
            ->allowEmptyString('dose');

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
