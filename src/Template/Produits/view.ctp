<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produit $produit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produit'), ['action' => 'edit', $produit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produit'), ['action' => 'delete', $produit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commandes'), ['controller' => 'Commandes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commande'), ['controller' => 'Commandes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produits view large-9 medium-8 columns content">
    <h3><?= h($produit->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $produit->has('store') ? $this->Html->link($produit->store->name, ['controller' => 'Stores', 'action' => 'view', $produit->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($produit->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $produit->has('location') ? $this->Html->link($produit->location->id, ['controller' => 'Locations', 'action' => 'view', $produit->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($produit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($produit->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Commandes') ?></h4>
        <?php if (!empty($produit->commandes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produit->commandes as $commandes): ?>
            <tr>
                <td><?= h($commandes->id) ?></td>
                <td><?= h($commandes->user_id) ?></td>
                <td><?= h($commandes->description) ?></td>
                <td><?= h($commandes->price) ?></td>
                <td><?= h($commandes->created) ?></td>
                <td><?= h($commandes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commandes', 'action' => 'view', $commandes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commandes', 'action' => 'edit', $commandes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commandes', 'action' => 'delete', $commandes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commandes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($produit->comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Produit Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produit->comments as $comments): ?>
            <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= h($comments->produit_id) ?></td>
                <td><?= h($comments->title) ?></td>
                <td><?= h($comments->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
