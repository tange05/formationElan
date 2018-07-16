
<div id="addStagiaireToSession">
    <div class="wrapper">

        <form method="post">
            <div class="row"> 
                <div class="col-sm" >
                    <select name="stagiaire">
                        <?php
                        foreach ($data as $key => $stagiaire) {
                            echo "<option value='{$stagiaire['ID_STAGIAIRE']}'>{$stagiaire['NOM']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm"><input type="submit" name="submit" value="addStagiaireToSessionGo" /></div>
                <div class="col-sm"><input type="submit" name="submit" value="Cancel" /></div>
            </div>
        </form>
    </div>
</div>