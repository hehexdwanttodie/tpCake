<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande $commande
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $commande->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $commande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commande->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commandes view large-9 medium-8 columns content">
    <h3><?= h($commande->description) ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($commande->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commande->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($commande->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($commande->produits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
<!--                <th scope="col"><?/*= __('Id') */?></th>
                <th scope="col"><?/*= __('Store Id') */?></th>-->
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($commande->produits as $produits): ?>
            <tr>
<!--                <td><?/*= h($produits->id) */?></td>
                <td><?/*= h($produits->store_id) */?></td>-->
                <td><?= h($produits->title) ?></td>
                <td><?= h($produits->created) ?></td>
                <td><?= h($produits->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produits', 'action' => 'view', $produits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produits', 'action' => 'edit', $produits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produits', 'action' => 'delete', $produits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
