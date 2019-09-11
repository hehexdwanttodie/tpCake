<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commandes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsToMany $Produits
 *
 * @method \App\Model\Entity\Commande get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commande newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commande|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commande saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commande[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commande findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommandesTable extends Table
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

        $this->setTable('commandes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsToMany('Produits');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Produits', [
            'foreignKey' => 'commande_id',
            'targetForeignKey' => 'produit_id',
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
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 191)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('price')
            ->allowEmptyString('price');

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
        $rules->add($rules->isUnique(['slug']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function findTagged(Query $query, array $options)
    {
        $columns = [
            'Commandes.id', 'Commandes.user_id', 'Commandes.description',
            'Commandes.price', 'Commandes.created',
            'Commandes.slug',
        ];

        $query = $query
            ->select($columns)
            ->distinct($columns);

        if (empty($options['produits'])) {
            // si aucun produit n'est fourni, trouvons les articles qui n'ont pas de produit
            $query->leftJoinWith('Produits')
                ->where(['Produits.title IS' => null]);
        } else {
            // Trouvons les articles qui ont au moins un des produits fourni
            $query->innerJoinWith('Produits')
                ->where(['Produits.title IN' => $options['produits']]);
        }

        return $query->group(['Commandes.id']);
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->produit_string) {
            $entity->produits = $this->_buildProduits($entity->produit_string);
        }

        // Le code déjà existant
    }

    protected function _buildProduits($produitString)
    {
        // Trim des Produits
        $newProduits = array_map('trim', explode(',', $produitString));
        // Retire les Produits vides
        $newProduits = array_filter($newProduits);
        // Dé-doublonne les produit
        $newProduits = array_unique($newProduits);

        $out = [];
        $query = $this->Produits->find()
            ->where(['Produits.title IN' => $newProduits]);

        // Retire les produits existant de la liste des nouveaux produit.
        foreach ($query->extract('title') as $existing) {
            $index = array_search($existing, $newProduits);
            if ($index !== false) {
                unset($newProduits[$index]);
            }
        }
        // Ajout des produits existant.
        foreach ($query as $produit) {
            $out[] = $produit;
        }
        // Ajout des nouveaux produits.
        foreach ($newProduits as $produit) {
            $out[] = $this->Produits->newEntity(['title' => $produit]);
        }
        return $out;
    }
}
