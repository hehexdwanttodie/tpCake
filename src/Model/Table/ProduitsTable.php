<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @property \App\Model\Table\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\CommandesTable&\Cake\ORM\Association\BelongsToMany $Commandes
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProduitsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('produits');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'produit_id'
        ]);
        $this->belongsToMany('Commandes', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'commande_id',
            'joinTable' => 'commandes_produits'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 191)
            ->allowEmptyString('title');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
