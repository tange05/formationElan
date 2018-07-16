
<div class="wrapper">
  <div class="row">
      <div class="col-sm">Initiation Session</div>
      <div class="col-sm">Date de debut</div>
      <div class="col-sm">Date de debut</div>
      <div class="col-sm">NB  theoriques</div>
      <div class="col-sm">NB  reservees</div>
      <div class="col-sm">NB  restantes</div>
      <div class="col-sm">Details </div>
      <div class="col-sm">Modify</div>

  </div>
    <?php
        foreach($sessionsArray as $key )
        {
            $remainedPlaces = $key['NB_PLACES'] - $key['STAGIAIRES'];
            echo "<div class='row'>"
                    . "<div class='col-sm'>{$key['TITRE']}</div>"
                    . "<div class='col-sm'>{$key['DATE_DEBUT']}</div>"
                    . "<div class='col-sm'>{$key['DATE_FIN']}</div>"
                    . "<div class='col-sm'>{$key['NB_PLACES']}</div>"
                    . "<div class='col-sm'>{$key['STAGIAIRES']}</div>"
                    . "<div class='col-sm'>$remainedPlaces</div>"
                    . "<div class='col-sm'><a href=?action=sessioninfo&sessionid={$key['ID_SESSION']}>Détails</a></div>"
                    . "<div class='col-sm'><a href=?action=modifysession&sessionid={$key['ID_SESSION']}>Modify</a></div>"
                . "</div>";
        }
    ?>

</div>
