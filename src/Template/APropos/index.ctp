
<?php $titre = "Tp3 Philippe Lalonde"; ?>


    <head>
        <title>À propos</title>
        <meta charset="utf-8" />
    </head>
    <body>

		<h1> À propos </h1>
        <p>
            Philippe Lalonde<br /> <br />

            420-5b7 MO Applications internet <br /> <br />

            Automne 2018, Collège Montmorency<br /> <br />
        </p>

        <h3> Utilisation du site web: </h3> <br />
        <p> Pour commencer, créer un utilisateur sur liste des utilisateurs, puis Nouvel utilisateur. <br />
            Après avoir confirmer votre inscription, vous recevrez un courriel pour confirmer votre email et donc <br />
            finaliser la création de votre compte. Les comptes de type admin on acces a tout. <br />
            En tant qu'utilisateur, vous pouvez seuleument faire des commandes de produits et des commentaires sur les produits. <br />
            Pour le bien du travail, admin est un option à la création de l'utilisateur.
        </p>
		 <h2>Diagramme de la base de données actuelle: </h2> <br /> <br />

            <?php echo $this->Html->image('Files/concepteur.jpg', ["alt" => 'Diagramme sur internet',]); ?>


		<p>
        <h2> Diagramme de la base de données de référence: </h2> <br /> <br />
        <?php echo $this->Html->image('Files/baseDeBase.jpg', ["alt" => 'Diagramme sur internet',]); ?>
		</p>
			<a href="http://www.databaseanswers.org/data_models/e_commerce/index.htm">Lien pour la base de données de référence:</a>



    <h4> Lien Github:</h4>
    <p><a href="https://github.com/hehexdwanttodie/tpCake">Lien GitHub</a></p>
    </body>



