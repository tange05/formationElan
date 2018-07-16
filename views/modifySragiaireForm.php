

<div class="wrapper" id="modifyStagiaireFromWrapper">

  <form method="post" action="?action=startUpdatingStagiaire&stagiaireid=<?php echo $oneStagiairesInfo["ID_STAGIAIRE"] ?>" >
    <div class="row ">
      <div class="col-sm-2 border"><label for="name" >Stagiaire name</label></div>
      <div class="col-sm border"><input type="text" name="name" value="<?php echo $oneStagiairesInfo["PRENOM"] ?>" required /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="name" >Stagiaire lastname</label></div>
      <div class="col-sm border"><input type="text" name="lastname" value="<?php echo $oneStagiairesInfo["NOM"] ?>" required /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="telphone" >Stagiaire telphone</label></div>
      <div class="col-sm border"><input type="telphone" name="telphone" value="<?php echo $oneStagiairesInfo["TELEPHONE"] ?>" required/></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="mail" >Mail</label></div>
      <div class="col-sm border"><input type="Mail" name="mail" value="<?php echo $oneStagiairesInfo["MAIL"] ?>" required/></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="sex" >Sex</label></div>
            <?php
            $isMale   = "";
            $isFemale = "";
              $genderType =  $oneStagiairesInfo["sex"]=="m" ? $isMale="selected" : $isFemale="selected" ;
            ?>
      <div class="col-sm border">
        <select name="sex">
            <option value="m" <?php echo $isMale ?>>Male</option>
            <option value="f" <?php echo $isFemale ?>>Female</option>
          </select>
      </div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="adresse" >Adresse</label></div>
      <div class="col-sm border"><input type="text" name="adresse" value="<?php echo $oneStagiairesInfo["adresse"] ?>" required /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="cp" >Code Postal</label></div>
      <div class="col-sm border"><input type="text" name="cp" value="<?php echo $oneStagiairesInfo["cp"] ?>" required/></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="city" >City</label></div>
      <div class="col-sm border"><input type="text" name="city" value="<?php echo $oneStagiairesInfo["VILLE"] ?>" required/></div>
  </div>
  <div class="row ">

    <div class="col-sm border"><input type="submit" name="submit" value="modifyStagiaireGo" /></div>
</div>
  </form>
</div>
