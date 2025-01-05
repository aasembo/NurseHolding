<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImagingRooms Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\HasMany $Exams
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\HasMany $Patients
 *
 * @method \App\Model\Entity\ImagingRoom newEmptyEntity()
 * @method \App\Model\Entity\ImagingRoom newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagingRoom> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImagingRoom get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ImagingRoom findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ImagingRoom patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagingRoom> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImagingRoom|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ImagingRoom saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ImagingRoom>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagingRoom>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagingRoom>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagingRoom> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagingRoom>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagingRoom>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagingRoom>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagingRoom> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagingRoomsTable extends Table
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

        $this->setTable('imaging_rooms');
        $this->setDisplayField('room_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Exams', [
            'foreignKey' => 'imaging_room_id',
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'imaging_room_id',
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
            ->scalar('room_name')
            ->maxLength('room_name', 255)
            ->requirePresence('room_name', 'create')
            ->notEmptyString('room_name');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}
