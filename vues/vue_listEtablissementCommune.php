<body>
    <?php include("include/header.html"); ?>
    <section class="principal">
        <h4>Les Etablissement de cette commune :</h4>
        <div class="graph">
            <!-- graph !-->
        </div>
        <ul style="column-count: 2;list-style: none;">
            <?php

            foreach ($listeEtablissement as $unEtablissement) {
                ?>
                <li>
                    <article>
                        <h2>Etablissements de cette commune</h2>
                        <div>
                            <span>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </span>
                            <span class="titre">
                                <?php echo $unEtablissement->__get('$_nom'); ?>
                            </span>
                        </div>
                        <hr/>
                        <div class="footer">
                            <?php echo $unEtablissement->__get('$_typeEtab'); ?>
                            <?php echo $unEtablissement->__get('$laRegion')->__get('$_regionCog'); ?>                    
                            <?php echo $unEtablissement->__get('$laCommune')->__get('$_cp') . " - " . $unEtablissement->__get('$laCommune')->__get('$_nomCommune'); ?>                    
                            <br><?php echo $unEtablissement->__get('$laCommune')->__get('$_adresse'); ?>
                            <br>
                            <br>
                            <a href="index.php?action=info&id=<?php echo $unEtablissement->__get('$_code');?>" class="button-savoir-plus">
                               En savoir +
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
