<div class="wrapper">
  <form method="post">
    <div class='row'>
      <div class="col-sm-2 border">Titre</div>
      <div class="col-sm border"><input type="text" name="titre" placeHolder="Titre Session" /></div>
    </div>
    <div class='row'>
      <div class="col-sm-2 border">Date debut</div>
      <div class="col-sm border"><input type="date" name="date_debut"  /></div>
    </div>
    <div class='row'>
      <div class="col-sm-2 border">Date fin</div>
      <div class="col-sm border"><input type="date" name="date_fin" /></div>
    </div>
    <div class='row'>
      <div class="col-sm-2 border">NB place</div>
      <div class="col-sm border"><input type="number" name="nb_places"  placeHolder="Max places"/></div>
    </div>
    <div class='row'>
      <div class="col-sm-2 border">Description</div>
      <div class="col-sm border">
        <textarea name="dscp"  placeHolder="Session description"></textarea>
      </div>
    </div>
    <div class="row ">
      <div class="col-sm border"><input type="submit" name="submit" value="addSessionGo" /></div>
    </div>
  </form>
</div>
