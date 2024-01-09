<?php
    $title = "dashboard";
    $style = ASSETS_CSS."dash.css";
    require_once HEADER;
?>
<style>
    .aside-bar .info .close{
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-left: 28%;
        color: white;
        height: 30px;
        text-align: center;
        font-weight: bold;
        width: 30px;
        background-color: red;
        border-radius: 50%;
        padding: 5px;
    }
</style>
<div class="aside-bar">
    <div class="info">
        <div><span><?php echo $coordination ?></span></div>
        <p>Coordination <br><?php echo $coordination ?></p>
        <span class= "close"><span>X</span></span>
    </div>
        <div class="options">
        <a href="Dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 4h6v8h-6z" />
            <path d="M4 16h6v4h-6z" />
            <path d="M14 12h6v8h-6z" />
            <path d="M14 4h6v4h-6z" />
            </svg>
            <span>Dashboard</span>
        </a>
        <a href="voir-les-candidatures">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
            <span>Voir les candidatures</span>
        </a>
        <a href="lancer-les-candidatures">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
            <path d="M10 12l4 0" />
            </svg>
            <span>Organiser les candidatures</span>
        </a>
        <a href="lancer-les-votes">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 11l3 3l8 -8" />
            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
            </svg>
            <span>Lancer les votes</span>
        </a>
        <a href="publier-les-resultat">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
            <path d="M9 12h6" />
            <path d="M9 16h6" />
            </svg>
            <span>Publier les resultats</span>
        </a>
        <a href="#" class="relancerVote">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
            </svg>
            <span>Relancer les elections</span>
        </a>
        <a href="mot de passe">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
            </svg>
            <span>
                Changer le mot de passe
            </span>
        </a>
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
                    <span>
                    Retour
                    </span>
                </a>
            <?php else:?>
                <a href="retour?vers=choix-groupe">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                    </svg>
                    <span>
                    Retour
                    </span>
                </a>
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
    <img src="<?php echo ASSETS_IMG."election.png" ?>" alt="" >
    <div class="div">
        <h3>Esis vote</h3>
        <div class="info">
            <div><span><?php echo $coordination ?></span></div>
            <p>Coordination <br><?php echo $coordination ?></p>
        </div>
    </div>
</header>

<div class="container">
    <div class="aside-bar-desktop">
        <div class="options">
                <a href="Dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4h6v8h-6z" />
                    <path d="M4 16h6v4h-6z" />
                    <path d="M14 12h6v8h-6z" />
                    <path d="M14 4h6v4h-6z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="voir-les-candidatures">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <span>Voir les candidatures</span>
            </a>
            <a href="lancer-les-candidatures">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                <path d="M10 12l4 0" />
                </svg>
                <span>Organiser les candidatures</span>
            </a>
            <a href="lancer-les-votes">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 11l3 3l8 -8" />
                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                </svg>
                <span>Lancer les votes</span>
            </a>
            <a href="publier-les-resultat">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M9 12h6" />
                <path d="M9 16h6" />
                </svg>
                <span>Publier les resultats</span>
            </a>
            <a href="#" class="relancerVote">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                <span>Relancer les elections</span>
            </a>
            <a href="mot de passe">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                </svg>
                <span>
                    Changer le mot de passe
                </span>
            </a>
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
                        <span>
                        Retour
                        </span>
                    </a>
                <?php else:?>
                    <a href="retour?vers=choix-groupe">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                        </svg>
                        <span>
                        Retour
                        </span>
                    </a>
                <?php endif?>
            <?php else:?>
                <?php header("Location: retour?vers=authentification-coordination")?>
            <?php endif?>
        </div>
    </div>
    <div class="contant">
            <div class="card-option">
                <div class="div-first">
                    <div class="div-1">
                        <img src="<?php echo ASSETS_IMG.'utilisateur (2).png' ?>" alt="">
                        <h5>
                            <?php echo 'Nombre <br> Candidature' ?>
                        </h5>
                        <?php echo '<span>'. $nombreCandidature.'</span>' ?>
                    </div>
                    <div class="div-2">
                        <img src="<?php echo ASSETS_IMG.'compte-a-rebours-de-sablier.png' ?>" alt="">
                            <h5>
                                <?php echo 'Jours <br> Restant' ?>
                            </h5>
                            <?php echo '<span>'. $jourVoteRestant .'</span>' ?>
                    </div>
                </div>
                <div class="div-3">
                    <img src="<?php echo ASSETS_IMG.'vote-manuel.png' ?>" alt="">
                        <h5>
                            <?php echo 'Nombre total <br>Des voix' ?>
                        </h5>
                    <?php echo '<span>'. $nombreVoix .'</span>' ?>
                </div>
            </div>
            <div class="card-option-two">
                <div class="card-statistique">
                    <div class="div-stat">
                        <div class='result'>
                            <table>
                                
                                <?php if(count($resultat) > 0):?>
                                <h4>Liste des candidats</h4>
                                
                                <?php $tabs = ['rgb(0, 180, 212)','rgb(255, 193, 37)',
                                'rgb(24, 255, 255)','rgb(251, 255, 24)','rgb(255, 24, 220)',
                                'rgb(24, 255, 159)','rgb(0, 110, 64)',
                                'rgb(110, 75, 0)','rgb(72, 0, 68)','rgb(231, 0, 0)'];
                                $i=0;
                                ?>
                                <?php foreach($resultat as $value): $voixGagnant?>
                                    <tr>
                                        <td>
                                            <p>
                                                <span class="ronde"><img src="<?php echo $value['photo'] ?>" alt="">
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span class="name">
                                                    <?php echo $value['nom'].' '.$value['prenom']?>
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p style="width:10em; border-radius:5px">
                                                <span style="height:0.7em;width :<?php echo ($value['nombre']/$nombreVoix)*100; ?>%;background-color:<?php echo $tabs[$i]; ?>;display:block; border-radius:3px">                                                
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span>
                                                    <?php echo $value['nombre'];  ?>
                                                </span>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach?>
                                <?php endif?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-option1" id="card-option1" style="background-image:url('<?php echo ASSETS_IMG."Lancer.jpg" ?>')">
                    <h3>Lancer <br>Les <br>Votes</h3>
                </div>
                </a>
            </div>
            <div class="cards-option">
                <div class="card-option2" id="card-option2">
                    <h3>Publier <br>les resultats</h3>
                </div>

                <div class="card-option3" id="card-option3">
                    <h3>Organiser <br>les candidatures</h3>
                </div>
            </div>
            <?php
            /*
                echo 'coordination '. $coordination . '<br>';
                echo 'nombre candidature '. $nombreCandidature . '<br>';
                echo 'nombre voix ' . $nombreVoix . '<br>';
                echo 'voix gagnant '.$voixGagnant . '<br>';//qui permettra de faire la bare de progression 
                echo 'jourVote restant '.$jourVoteRestant . '<br>';
            */
            ?>
                <?php
                    if(isset($notif))
                        echo '<span class="error" hidden>'.$notif.'</span>';
                ?>
                </div>
            </div>
    </div>
</div>
<?php
    $script = ASSETS_JS."coordination/script.js";
    require_once FOOTER;
?>