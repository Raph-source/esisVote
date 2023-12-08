<?php
    $title = "dashboard";
    $style = ASSETS_CSS."dash.css";
    require_once HEADER;
?>
    <div class="aside-bar">
        <div class="info">
            <div><span>L1</span></div><p>Coordination <br> <span>Licence 1</span></p>
        </div>
        <div class="options">
            <a href="voir-les-candidatures">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 4h6v8h-6z" />
                <path d="M4 16h6v4h-6z" />
                <path d="M14 12h6v8h-6z" />
                <path d="M14 4h6v4h-6z" />
            </svg><span>Dashboard</span></a>

            <a href="voir-les-candidatures">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
            </svg><span>Voir les candidatures</span></a>

            <a href="lancer-les-candidatures">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
            <path d="M10 12l4 0" />
            </svg>
            <span>Oganiser les candidatures</span></a>
            <a href="lancer-les-votes">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 11l3 3l8 -8" />
            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
            </svg>
            <span>lancer les votes</span></a>

            <a href="publier-les-resultat">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
            <path d="M9 17v-5" />
            <path d="M12 17v-1" />
            <path d="M15 17v-3" />
            </svg>
            <span>Publlier les resultats</span></a>
            <a href="relancer-les-votes">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
            </svg>
            <span>Relancer les elections</span></a>
            <!-- le bouton retour-->
            
            <?php if(isset($_SESSION['idPromotion'])):?>
                <?php if($_SESSION['idPromotion'] == 1):?>
                    <a href="retour?vers=authentification-coordination">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                    </svg>
                    <span>Retour</span></a>
                <?php else:?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                    </svg>
                    <span>Retour</span></a>
                <?php endif?>
            <?php else:?>
                <?php header("Location: retour?vers=authentification-coordination")?>
            <?php endif?>
        </div>
    </div>

    <header>
        <div class="barre">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <img src="<?php echo ASSETS_IMG."election.png";?>" alt="">
        <h3><span></span>Esis vote</h3>
        <div class="info-desktop">
            <div><span>L1</span></div><p>Coordination <br> <span>Licence 1</span></p>
        </div>
    </header>
    <div class="container">
        <div class="x">
            <div class="options">
                <a href="voir-les-candidatures">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4h6v8h-6z" />
                    <path d="M4 16h6v4h-6z" />
                    <path d="M14 12h6v8h-6z" />
                    <path d="M14 4h6v4h-6z" />
                </svg><span>Dashboard</span></a>

                <a href="voir-les-candidatures">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                </svg><span>Voir les candidatures</span></a>

                <a href="lancer-les-candidatures">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                <path d="M10 12l4 0" />
                </svg>
                <span>Oganiser les candidatures</span></a>
                <a href="lancer-les-votes">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 11l3 3l8 -8" />
                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                </svg>
                <span>lancer les votes</span></a>

                <a href="publier-les-resultat">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M9 17v-5" />
                <path d="M12 17v-1" />
                <path d="M15 17v-3" />
                </svg>
                <span>Publlier les resultats</span></a>
                <a href="relancer-les-votes">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                <span>Relancer les elections</span></a>
                <!-- le bouton retour-->
                
                <?php if(isset($_SESSION['idPromotion'])):?>
                    <?php if($_SESSION['idPromotion'] == 1):?>
                        <a href="retour?vers=authentification-coordination">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                        </svg>
                        <span>Retour</span></a>
                    <?php else:?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                        </svg>
                        <span>Retour</span></a>
                    <?php endif?>
                <?php else:?>
                    <?php header("Location: retour?vers=authentification-coordination")?>
                <?php endif?>
            </div>
        </div>
        <div class="card-option">
            <div class="div-first">
                <div class="div-1"> 
                    <img src="<?php echo ASSETS_IMG."utilisateur (1).png"; ?>" alt="">
                    <h5>Nombre <br> de candidats :</h5> 
                    <span><?php echo $nombreCandidature; ?></span><?php ?>
                </div>
                <div class="div-2">
                    <img src="<?php echo ASSETS_IMG."compte-a-rebours-de-sablier.png"; ?>" alt="">
                    <h5>Jour <br> restant :</h5> 
                    <span><?php echo $nombreVoix; ?></span><?php ?>
                </div>
            </div>
            <div class="div-3">
                <img src="<?php echo ASSETS_IMG."vote-manuel.png"; ?>" alt="">
                <h5>Nombre total <br> de votes</h5> 
                <span><?php echo $jourVoteRestant; ?></span><?php ?>
            </div>
        </div>

        <div class="card-statistique">
            <h5>Liste des candidats</h5>
        </div>
        <div class="card-option1" style="background-image : url(<?php echo ASSETS_IMG.'Lancer.jpg' ?>)">
            <h3>Lancer <br>Un nouveau <br>vote</h3>
        </div>
        <div class="divs-card">
            <div class="card-option2">
                <h3>Publier <br>les resultats</h3>
            </div>
            <div class="card-option3">
                <h3>Voir <br>les resultats</h3>
            </div>
        </div>
        <?php
            //echo 'coordination '. $coordination . '<br>';
          /* echo $nombreCandidature;
            echo 'nombre candidature '. $nombreCandidature . '<br>';
            echo 'nombre voix ' . $nombreVoix . '<br>';
            echo 'voix gagnant '.$voixGagnant . '<br>';//qui permettra de faire la bare de progression 
            echo 'jourVote restant '.$jourVoteRestant . '<br>';*/
        ?>
        <?php if(count($resultat) > 0):?>
            <p>Resultat</p>
            <?php foreach($resultat as $value):?>
                <p>
                    <?php echo $value['nom'].' '.$value['postNom'].' '.$value['prenom'].' '.$value['nombre'];?>
                </p>
            <?php endforeach?>
        <?php endif?>

        <?php
            if(isset($notif))
                echo $notif;
        ?>

    </div>
</div>
<?php
    require_once FOOTER;
?>