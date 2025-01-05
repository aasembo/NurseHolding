<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nurses Model
 *
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsToMany $Patients
 *
 * @method \App\Model\Entity\Nurse newEmptyEntity()
 * @method \App\Model\Entity\Nurse newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Nurse> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nurse get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Nurse findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Nurse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Nurse> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nurse|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Nurse saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Nurse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nurse>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nurse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nurse> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nurse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nurse>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nurse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nurse> deleteManyOrFail(iterable $entities, array $options = [])
 */
class NursesTable extends Table
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

        $this->setTable('nurses');
        $this->setDisplayField('LastName');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Patients', [
            'foreignKey' => 'nurse_id',
            'targetForeignKey' => 'patient_id',
            'joinTable' => 'nurses_patients',
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
            ->scalar('LastName')
            ->maxLength('LastName', 255)
            ->requirePresence('LastName', 'create')
            ->notEmptyString('LastName');

        $validator
            ->scalar('FirstName')
            ->maxLength('FirstName', 255)
            ->requirePresence('FirstName', 'create')
            ->notEmptyString('FirstName');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('VoalteNumber')
            ->maxLength('VoalteNumber', 15)
            ->allowEmptyString('VoalteNumber');

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
