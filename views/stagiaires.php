
<a href="?action=addnewsession">Add new Stagiaire</a>
<div class="wrapper">
  <div class="row">
    <div class="col-sm">Nom Stagiaire</div>
    <div class="col-sm">Prenom</div>
    <div class="col-sm">Telephone</div>
    <div class="col-sm">Mail</div>
    <div class="col-sm">Ville</div>
    <div class="col-sm">Details</div>
    <div class="col-sm">Modify</div>
  </div>
    <?php
        foreach($stagiaires as $key )
        {
            echo "<div class='row'>"
                    . "<div class='col-sm'>{$key['NOM']}</div>"
                    . "<div class='col-sm'>{$key['PRENOM']}</div>"
                    . "<div class='col-sm'>{$key['TELEPHONE']}</div>"
                    . "<div class='col-sm'>{$key['MAIL']}</div>"
                    . "<div class='col-sm'>{$key['VILLE']}</div>"
                    . "<div class='col-sm'><a href=?action=stagiaireinfo&stagiaireid={$key['ID_STAGIAIRE']}>Détails</a></div>"
                    . "<div class='col-sm'><a href=?action=modifystagiaire&stagiaireid={$key['ID_STAGIAIRE']}>Modify</a></div>"
                . "</div>";
        }
    ?>

</div>
