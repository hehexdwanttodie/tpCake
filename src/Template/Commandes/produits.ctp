<h1>
    Commandes avec les produits
    <?= $this->Text->toList(h($produits), 'ou') ?>
</h1>

<section>
    <?php foreach ($commandes as $commande): ?>
        <article>
            <!-- Utilisation du HtmlHelper pour créer le lien -->
            <h4><?= $this->Html->link(
                    $commande->description,
                    ['controller' => 'Commandes', 'action' => 'view', $commande->slug]
                ) ?></h4>
            <span><?= h($commande->created) ?>
        </article>
    <?php endforeach; ?>
</section>
