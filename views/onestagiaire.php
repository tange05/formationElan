<?php //var_dump($oneStagiairesInfo);?>
<?php //var_dump($sessionsArray)?>

<div class="wrapper  border">
    <div class="row border">
        <div class="col-sm"><h1><?php echo $oneStagiairesInfo['NOM'].' '.$oneStagiairesInfo['PRENOM']?></h1></div>
    </div>
    <div class="row border">
        <div class="col-sm ">Telephone</div>
        <div class="col-sm"><?php echo $oneStagiairesInfo['TELEPHONE']?></div>
    </div>
     <div class="row border">
        <div class="col-sm">Sex</div>
        <div class="col-sm"><?php echo $oneStagiairesInfo['sex']?></div>
    </div>
     <div class="row border">
        <div class="col-sm">Email</div>
        <div class="col-sm"><?php echo $oneStagiairesInfo['MAIL']?></div>
    </div>
    <div class="row border">
        <div class="col-sm">Adresse</div>
        <div class="col-sm">
            <?php echo $oneStagiairesInfo['adresse']?><br>
            <?php echo $oneStagiairesInfo['cp']?><br>
            <?php echo $oneStagiairesInfo['VILLE']?><br>

        </div>
    </div>

</div>

<h1>Les sessions pour le Stagiaire <?php echo  $oneStagiairesInfo['NOM'].' '.$oneStagiairesInfo['PRENOM']?></h1>
