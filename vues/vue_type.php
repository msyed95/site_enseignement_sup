<body>
    <?php include("include/header.html"); ?>
    <section class="principal">
        <h4>Les Types d'établissement :</h4>
        <div class="graph">
            <!-- graph !-->
        </div>
        <ul style="column-count: 2;list-style: none;">
            <?php
            foreach ($listeTypes as $unType) {
                $nmbEtablissementByType = count(Etablissement::getEtablissementByType($unType));
                ?>
                <li>
                    <article>
                        <h2>Types d'etablissement</h2>
                        <div>
                            <span>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </span>
                            <span class="titre">
                                <?php echo $unType; ?>
                            </span>
                        </div>
                        <hr/>
                        <div class="footer">
                            <?php echo "Il y a " . $nmbEtablissementByType . " établissements pour ce type"; ?>
                            <br>
                            <br>
                            <?php
                                $id = str_replace("-", "__", $unType);
                                $id = str_replace(" ", "-", $id);
                                ?>
                                <a href="index.php?action=infoType&id=<?php echo $id; ?>" class="button-savoir-plus">
                                    Découvrir
                                </a>
                        </div>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>
    <?php include("include/menu_lat.php"); ?>
</body>
