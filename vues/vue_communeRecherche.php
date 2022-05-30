<body>
    <?php include("include/header.html"); ?>
    <section class="principal">
        <h4>Nos Résultats :</h4>
        <div class="graph">
            <!-- graph !-->
        </div>
        <ul style="column-count: 2;list-style: none;">
            <?php
            foreach ($resultatCommune as $unNomCommune) {
                    $nmbEtablissement = count(Etablissement::getEtablissementByCommune($unNomCommune));
                    if ($nmbEtablissement != 0) {
                        ?>
                        <li>
                            <article>
                                <h2>Nombre d'Etablissements dans cette commune</h2>
                                <div>
                                    <span>
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    </span>
                                    <span class="titre">
                                        <?php echo $unNomCommune; ?>
                                    </span>
                                </div>
                                <hr/>
                                <div class="footer">
                                    <?php echo "Il y a " . $nmbEtablissement . " établissements pour cette commune"; ?>
                                    <br>
                                    <br>
                                    <a href="index.php?action=infoEtablissementCommune&id=<?php echo $unNomCommune; ?>" class="button-savoir-plus">
                                        Découvrir
                                    </a>
                                </div>
                            </article>
                        </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </section>
    <?php include("include/menu_lat.php"); ?>
</body>
