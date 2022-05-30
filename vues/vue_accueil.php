<body>
    <?php include("include/header.html"); ?>
    <section class="principal">
        <h4>Accueil</h4>
        <?php
        if (isset($_SESSION['error'])) { // si il y a une erreur
            echo $_SESSION['error'];
            $_SESSION['error'] = ""; // on supprime le message de la session
        }
        ?>
        <ul class="liste-recherche">
           <li>
                <h4> Rechercher une region </h4>
                <form class="form" action="index.php?action=recherche" method="POST">
                    <input type="text" name="field_search" placeholder="Saisir votre recherche"/>
                    <input type="submit" name="btnRegion" value="Rechercher" class="button"/>
                </form>
            </li>
            <li>
                <h4> Rechercher un établissement </h4>
                <form class="form" action="index.php?action=recherche" method="POST">
                    <p style="font-size:12px;"><input type="checkbox" name="test" onclick="changeEtatBlock('etablissement', true)"/>Afficher la liste déroulante des établissements</p>
                    <select style="margin-bottom:10px;width:100%;" name="liste" class="cacher" id="etablissement">
                        <?php
                        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
                            ?> <option value="<?php echo $unEtablissement->__get('$_nom'); ?>"><?php echo $unEtablissement->__get('$_nom'); ?></option> <?php
                        }
                        ?>
                    </select>
                    <input type="submit" name="btnEtablissement" value="Rechercher" class="button"/>
                </form>
            </li>
            <li>
                <h4> Rechercher une commune </h4>
                <form class="form" action="index.php?action=recherche" method="POST">
                    <p style="font-size:12px;"><input type="checkbox" name="test" onclick="changeEtatBlock('commune', true)"/>Afficher la liste déroulante des communes</p>
                    <select style="margin-bottom:10px;width:100%" name="liste" class="cacher" id="commune">
                        <?php
                        foreach (Commune::$lesCommunes as $uneCommune) {
                            ?> <option value="<?php echo $uneCommune; ?>"><?php echo $uneCommune; ?></option> <?php
                        }
                        ?>
                    </select>
                    <input type="submit" name="btnCommune" value="Rechercher" class="button"/>
                </form>
            </li>
            <li>
                <h4> Rechercher un type </h4>
                <form class="form" action="index.php?action=recherche" method="POST">
                    <p style="font-size:12px;"><input type="checkbox" name="test" onclick="changeEtatBlock('type', true)"/>Afficher la liste déroulante des types</p>
                    <select style="margin-bottom:10px;width:100%;" name="liste" class="cacher" id="type">
                        <?php
                        foreach (Etablissement::$lesTypes as $unType) {
                            ?> <option value="<?php echo $unType; ?>"><?php echo $unType; ?></option> <?php
                        }
                        ?>
                    </select>
                    <input type="submit" name="btnType" value="Rechercher" class="button"/>
                </form>
            </li>
        </ul>
    </section>
    <?php include("include/menu_lat.php"); ?>
</body>
</html>