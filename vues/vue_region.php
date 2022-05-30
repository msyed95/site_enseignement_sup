<body>
    <?php include ('include/header.html'); ?>
    <section class="principal">
        <h4>Nos Résultats :</h4>
        <div class="graph">
            <!-- graph !-->
        </div>
        <ul style="column-count: 2;list-style: none;">
            <?php
            foreach ($resultatRegion as $uneRegion) {
                if ($uneRegion != "") {
                    ?>
                    <li>
                        <article>
                            <h2>Nb d'établissement par région</h2>
                            <div>
                                <span>
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </span>
                                <span class="titre">
                                    <?php echo $uneRegion ?>
                                </span>
                            </div>
                            <hr/>
                            <div class="footer">
                                <?php
                                $count = count(Region::getEtablissementByRegion($uneRegion));
                                echo "Il y à " . $count . " établissements dans cette région";
                                ?>
                                <br>
                                <br>
                             <?php
                                $id = str_replace("-", "__", $uneRegion);
                                $id = str_replace(" ", "-", $id);
                                ?>
                                <a href="index.php?action=listeEtablissementByRegion&id=<?php echo $id; ?>" class="button-savoir-plus">
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

