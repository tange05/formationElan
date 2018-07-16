

<div class="wrapper" id="modifyStagiaireFromWrapper">

  <form method="post"  >
    <div class="row ">
      <div class="col-sm-2 border"><label for="name" >Stagiaire name</label></div>
      <div class="col-sm border"><input type="text" name="name"   /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="name" >Stagiaire lastname</label></div>
      <div class="col-sm border"><input type="text" name="lastname"   /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="telphone" >Stagiaire telphone</label></div>
      <div class="col-sm border"><input type="telphone" name="telephone"  /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="mail" >Mail</label></div>
      <div class="col-sm border"><input type="Mail" name="mail"  /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="sex" >Sex</label></div>
      <div class="col-sm border">
        <select name="sex">
            <option value="m" >Male</option>
            <option value="f" >Female</option>
          </select>
      </div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="daten" >Date de nissance</label></div>
      <div class="col-sm border"><input type="date" name="daten"    /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="adresse" >Adresse</label></div>
      <div class="col-sm border"><input type="text" name="adresse"   /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="cp" >Code Postal</label></div>
      <div class="col-sm border"><input type="text" name="cp"  /></div>
    </div>
    <div class="row ">
      <div class="col-sm-2 border"><label for="city" >City</label></div>
      <div class="col-sm border"><input type="text" name="city"  /></div>
  </div>
  <div class="row ">

    <div class="col-sm border"><input type="submit" name="submit" value="addStagiaireGo" /></div>
</div>
  </form>
</div>
