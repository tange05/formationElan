
<div class="wrapper">
  <form method="post">
      <div class="row">
        <div class="col-sm-2">Module titre</div>
        <div class="col-sm-2"><input type="text" name="module" /></div>
        <div class="col-sm-2">Categorie</div>
        <div class="col-sm">
          <select name="cat">
                <?php 
                    foreach($data as $key => $val){
                        echo "<option value={$val['ID_CAT']}>{$val['NOM_CAT']}</option>";
                    }
                
                ?>
              
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2"><input type="submit" name="submit" value="addmoduleGo" /></div>

      </div>

  </form>
</div>
