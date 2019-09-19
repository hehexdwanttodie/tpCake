<?php
namespace App\Controller;

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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $commandes = $this->paginate($this->Commandes);

        $this->set(compact('commandes'));
    }

    /**
     * View method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commande = $this->Commandes->get($id, [
            'contain' => ['Users', 'Produits']
        ]);

        $this->set('commande', $commande);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commande = $this->Commandes->newEntity();
        if ($this->request->is('post')) {
            $commande = $this->Commandes->patchEntity($commande, $this->request->getData());
            $commande->user_id = $this->Auth->user('id');
            if ($this->Commandes->save($commande)) {
                $this->Flash->success(__('The commande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commande could not be saved. Please, try again.'));
        }
        $users = $this->Commandes->Users->find('list', ['limit' => 200]);
        $produits = $this->Commandes->Produits->find('list', ['limit' => 200]);

        $this->set('produits', $produits);
        $this->set('commande', $commande);
    }

    /**
     * Edit method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug)
    {
        $commande = $this->Commandes
            ->findBySlug($slug)
            ->contain('Produits') // Charge les produits associés
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Commandes->patchEntity($commande, $this->request->getData(), [
                // Ajouté : Empêche la modification du user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Commandes->save($commande)) {
                $this->Flash->success(__('Votre commande a été modifié.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour la commande.'));
        }

        // Récupère une liste des tags.
        $produits = $this->Commandes->Produits->find('list');


        $this->set('produits', $produits);
        $this->set('commande', $commande);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commande = $this->Commandes->get($id);
        if ($this->Commandes->delete($commande)) {
            $this->Flash->success(__('The commande has been deleted.'));
        } else {
            $this->Flash->error(__('The commande could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // Les actions 'add' et 'produits' sont toujours autorisés pour les utilisateur
        // authentifiés sur l'application
        if (in_array($action, ['add', 'produits'])) {
            return true;
        }

        // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }


        $commande = $this->Commandes->findBySlug($slug)->first();

        return $commande->user_id === $user['id'];
    }
}
