<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Commandes Controller
 *
 * @property \App\Model\Table\CommandesTable $Commandes
 *
 * @method \App\Model\Entity\Commande[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommandesController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id','user_id', 'description'
        ]
    ];


}
