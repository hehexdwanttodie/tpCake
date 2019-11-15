<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produit $produit
 */
?>
<div class="produits view large-9 medium-8 columns content">
    <h3><?= h($produit->title) ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($produit->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $produit->has('location')  ?></td>
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
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
