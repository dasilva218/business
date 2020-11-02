<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enregistrement candidat - Ecole 241 Business</title>

    <link rel="stylesheet" type="text/css" href="<?= theme_url() ?>assets/css/formulaire_candidat.css">
</head>

<body>

    <!--============== Start of the container =====================-->
    <div class="container">
        <!--===*** The left ***===-->
        <div class="left">
            <div class="logo">
                <img src="<?= theme_url() ?>assets/images/formulaires/Ebusiness.png" alt="logo de l'Ecole 241 BUSINESS">
            </div>
            <div class="header">
                <h2 class="animation a1">Formulaire du candidat</h2>
            </div>
            <?= validation_errors()?>
            <!--===*** Start of Form ***===-->
            <form class="form" action="<?= site_url('candidat/traitement_enregistrement') ?>" method="POST">
                <input type="nom" name="nom" class="form-field animation a3" placeholder="Nom Ex. SAMBA">
                <?= form_error('nom') ?>
                <input type="prenom" name="prenom" class="form-field animation a3" placeholder="Prenom Ex. Pascal">
                <?= form_error('prenom') ?>
                <fieldset class="animation a3">
                    <label for="name">Votre sexe</label>
                    <input type="radio" name="sexe" value="H" checked><label for="homme">H</label>
                    <input type="radio" name="sexe" value="F"><label for="femme">F</label>
                </fieldset>

                <fieldset class="animation a3">
                    <label for="name">Date de naissance</label>
                    <input type="date" value="1989-12-01" name="date" class="form-field animation a3">
                </fieldset>

                <input type="email" name="email" class="form-field animation a3" placeholder="Adresse mail">
                <?= form_error('email') ?>
                <input type="tel" name="telephone" class="form-field animation a3" placeholder="Numéro de téléphone Ex. 077 01 89 00">
                <?= form_error('telephone') ?>
                <input type="tel" name="num_what" class="form-field animation a3" placeholder="Numéro de téléphone WhatsApp Ex. 077 01 89 00">
                <?= form_error('num_what') ?>
                <fieldset class="animation a3">
                    <label for="horaire">Horaire</label>
                    <input type="radio" name="horaire" checked value="Matin" required><label for="horaire">Matin</label>
                    <input type="radio" name="horaire" value="Après-midi" required><label for="horaire">Après-midi</label>
                </fieldset>

                <input type="text" name="domaine" class="form-field animation a3" placeholder="Votre domaine d’activité Ex. Artisanat">
                <input type="text" name="service" class="form-field animation a3" placeholder="Type de service">

                <div data-validate="Message is requiredd" class="animation a3">
                    <textarea type="text" class="input100" name="attentes" placeholder="Vos attentes par rapport à cette formation"></textarea>
                </div>
                <button class="animation a6">S’enregistrer</button>
            </form>
            <!--===*** End of Form ***===-->
        </div>
        <!--===*** The right ***===-->
        <div class="right"></div>
    </div>
    <script src="<?= theme_url() ?>assets/js/formulaire_candidat.js"></script>

</body>


</html>