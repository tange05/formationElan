

<div class="border">
    <h1><?php   echo $sessionInfo['sessionInfo']['TITRE'] ?></h1>
    <ul>
        <li><?php   echo $sessionInfo['sessionInfo']['TITRE'] ?></li>
        <li>Start Date:- <?php   echo $sessionInfo['sessionInfo']['DATE_DEBUT'] ?></li>
        <li>End Date:-   <?php   echo $sessionInfo['sessionInfo']['DATE_FIN'] ?></li>
        <li>NB_PLACES:-  <?php   echo $sessionInfo['sessionInfo']['NB_PLACES'] ?></li>
    </ul>
    <p><?php   echo $sessionInfo['sessionInfo']['DSCP'] ?></p>

</div>
    <div class="wrapper modelWrapper border">
        <div class="col-sm">
            
            <a href="?action=sessioninfo&param=newmodule&sessionid=<?=  $sessionInfo['sessionInfo']['ID_SESSION']?>">Add new Module to this session</a>
            <?php if(isset($viewModules))  echo $viewModules;?>    
        </div>
    <?php
        //here we are displaying the program of the session
        foreach($sessionInfo['sessionProgram'] as $key => $program){
     ?>
        <div class="row">
            <div class="col-sm text-center"><?PHP ECHO $program['nom_cat']?></div>
        </div>
        <div class="row">
            <div class="col-sm text-center">Module</div>
            <div class="col-sm text-center">Nombre de jours</div>
        </div>
        <?php foreach($program['models'] as $key => $model){ ?>
            <div class="row">
               <div class="col-sm text-center"><?PHP ECHO $model['NOM_MODULE']?></div>
               <div class="col-sm text-center"><?PHP ECHO $model['NB_JOURS']?></div>
            </div>
        <?php }?>
    <?php }?>
</div>

<br>
<div class="wrapper stagiaireWrapper border">
    <div class="col-sm">
            <a href="?action=sessioninfo&param=newstagiairetosession&sessionid=<?=  $sessionInfo['sessionInfo']['ID_SESSION']?>">Add new Module to this session</a>
            <?php if(isset($viewStagiaire))  echo $viewStagiaire;?>    
    </div>
    <div class="row">
        <div class="col-sm text-center">Nom Stagiaire</div>
        <div class="col-sm text-center">Prenom</div>
        <div class="col-sm text-center">Telephone</div>
        <div class="col-sm text-center">Mail</div>
        <div class="col-sm text-center">Ville</div>
        <div class="col-sm text-center">Details</div>
    </div>
    <?php
        foreach( $sessionInfo['stagiairesForSession'] as $key => $stagiaire )
        {

            echo "<div class='row'>"
                    . "<div class='col-sm '>{$stagiaire['NOM']}</div>"
                    . "<div class='col-sm '>{$stagiaire['PRENOM']}</div>"
                    . "<div class='col-sm'>{$stagiaire['TELEPHONE']}</div>"
                    . "<div class='col-sm'>{$stagiaire['MAIL']}</div>"
                    . "<div class='col-sm'>{$stagiaire['VILLE']}</div>"
                    . "<div class='col-sm'><a href=?action=stagiaireinfo&stagiaireid={$stagiaire['ID_STAGIAIRE']}>Détails</a></div>"
                . "</div>";
        }
    ?>

</div>
