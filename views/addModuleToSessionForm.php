<div id="addModuleToSession">
    <div class="wrapper">
        <div class="row">
            <div class="col-sm" >
        <form method="post">
            <select name="module">
                <?php
                    foreach($data as $key=>$module){
                        echo "<option value='{$module['ID_MODULE']}'>{$module['NOM_MODULE']}</option>";
                    }

                 ?>
            </select>
            </div>
            <div class="col-sm">NB jours</div>
            <div class="col-sm"><input type="text" name="nbjours" placeholder="NB jours" /></div>
            <div class="col-sm">
                <input type="submit" name="submit" value="addModuleToSessionGo" />
            </div>
            
            <div class="col-sm">
                <input type="submit" name="submit" value="Cancel" />
            </div>
        </form>
        </div>
    </div>
</div>