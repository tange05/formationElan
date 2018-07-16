
<form method="post">
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-2">Session</div>
            <div class="col-sm-2">
            <select name="session">
                    <?php foreach($data[0] as $key => $val){?>
                    <option value="<?php echo $val["ID_SESSION"] ?>"><?php echo $val["TITRE"]; }?></option>
                </select>
            </div>
            <div class="col-sm-2">Module</div>
            <div class="col-sm-2">
                <select name="module">
                    <?php foreach($data[1] as $key => $val){?>
                    <option value="<?php echo $val["ID_MODULE"] ?>"><?php echo $val["NOM_MODULE"]; }?></option>
                </select>
            </div>
            <div class="col-sm-2">NBjours</div>
            <div class="col-sm-2"><input type="text" name="nbjour" ></div>
        </div>
        <div class="row">
            <input type="submit" name="submit" value="bindModuleSessionGo" />
        </div>
    </div>

</form>