<aside class="menu-lat">
    <section class="scroll">
        <h4>
            Vos dernières recherches :
        </h4>
        <?php
        $compteur = $_SESSION['compteur']; // on récupere le nombre de cookies
            // on fait $compteur -1 car il commence a 0 donc fera cookie0, cookie1
            for ($i = $compteur; $i != 0; $i--) {
                if(isset($_COOKIE['texte'.$i],$_COOKIE['champ'.$i])) {
                    ?>
                    <div class="recherche">
                        <div class="block-top"><?php echo $_COOKIE['champ' . $i]; ?></div>
                        <hr/>
                        <div class="block-bottom">
                            <p><?php echo $_COOKIE['texte' . $i]; ?></p>
                            
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </section>
</aside>