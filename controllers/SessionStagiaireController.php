<?php

class SessionStagiaireController extends Controller {

    function addStagiaireToSessionC($sessionId) {
        if (!empty($_POST)) {
            $stagiaireId = $_POST['stagiaire'];
            $sessionStagiaireModel = $this->model('SessionStagiaireManager');
            $sucsses = $sessionStagiaireModel->addStagiaireToSessionM($sessionId,$stagiaireId);
            if($sucsses > 0){
                echo "<script>alert('Stagiaire has been Adeed to session !')</script>";
            }else{
                echo "<script>alert('There was Problem!')</script>";
            }
        }
    }

}
