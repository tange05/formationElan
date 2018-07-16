<?php

class SessionModuleController extends Controller {

    public function addModuleToSessionC($sessionId) {
        if (!empty($_POST)) {

            $requiredFeilds = array(
                "nbjours"
            );

            $module = $this->validateForm($_POST, $requiredFeilds);
            var_dump($module);
            if (!empty($module)) {
                $sesionModuleManager = $this->model('SessionModuleManager');
                $sucsses = $sesionModuleManager->addModuleToSessionM($module,$sessionId);
                if ($sucsses > 0) {
                    echo "<script>alert('Module has been Adeed to session !')</script>";
                } else {
                    echo "<script>alert('There was Problem!')</script>";
                }
            }
        }
    }

}
