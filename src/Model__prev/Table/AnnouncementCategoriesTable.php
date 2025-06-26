<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnnouncementCategories Model
 *
 * @property \App\Model\Table\AnnouncementsTable&\Cake\ORM\Association\BelongsTo $Announcements
 *
 * @method \App\Model\Entity\AnnouncementCategory newEmptyEntity()
 * @method \App\Model\Entity\AnnouncementCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AnnouncementCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnnouncementCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AnnouncementCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AnnouncementCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AnnouncementCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnnouncementCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AnnouncementCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AnnouncementCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AnnouncementCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AnnouncementCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AnnouncementCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AnnouncementCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AnnouncementCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AnnouncementCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AnnouncementCategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AnnouncementCategoriesTable extends Table
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

        $this->setTable('announcement_categories');
        $this->setDisplayField('category_name');
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
            ->scalar('category_name')
            ->maxLength('category_name', 255)
            ->requirePresence('category_name', 'create')
            ->notEmptyString('category_name');

        $validator
            ->scalar('category_value')
            ->requirePresence('category_value', 'create')
            ->notEmptyString('category_value');

        return $validator;
    }

}
