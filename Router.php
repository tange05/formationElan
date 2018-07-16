<?php

require_once 'controllers/Controller.php';
include 'controllers/SessionController.php';
include 'controllers/StagiaireController.php';
include 'controllers/ModuleController.php';
include 'controllers/SessionStagiaireController.php';
include 'controllers/SessionModuleController.php';

class Router {
    public function __construct() {
        $sessionController = new SessionController;
        $stagiaireController = new StagiaireController;
        $moduleController = new ModuleController;
        $sessionStagiaireController = new SessionStagiaireController;
        $sessionModuleController = new SessionModuleController;

        if (isset($_GET['action']) and $_GET['action'] != '') {
            $action = $_GET['action'];
            switch ($action) {
                case "getsessions": {
                        $sessionController->afficheSessions();
                        break;
                    }
                case 'getstagiaires': {
                        $stagiaireController->afficheStagiaires();
                    }
                    break;
                case "sessioninfo" : {
                        if (isset($_GET["sessionid"])and $_GET["sessionid"] != '') {
                            $sessionId = $_GET["sessionid"];
                            
                            if(!isset($_GET['param'])){   
                                 $sessionController->afficheSessionInfo($sessionId);
                            }
                            else{
                                 
                                 if(isset($_GET['param']) and $_GET['param'] == 'newstagiairetosession'){
                                    $parameters = $_GET['param'];
                                    $sessionController->afficheSessionInfo($sessionId, $parameters);
                                    if(isset($_POST['submit']) and $_POST['submit'] == 'addStagiaireToSessionGo'){
                                        $sessionStagiaireController->addStagiaireToSessionC($sessionId);
                                    }
                                 
                                 }
                                 if(isset($_GET['param']) and $_GET['param'] == 'newmodule'){
                                    $parameters = $_GET['param'];
                                    $sessionController->afficheSessionInfo($sessionId, $parameters);
                                    if(isset($_POST['submit']) and $_POST['submit'] == 'addModuleToSessionGo'){
                                        $sessionModuleController->addModuleToSessionC($sessionId, $parameters);
                                    }
                                     
                                 }
                            }
                                 
                        }

                    }
                    break;
                case "stagiaireinfo": {
                        if (isset($_GET["stagiaireid"])and $_GET["stagiaireid"] != '') {
                            $stagiaireid = $_GET["stagiaireid"];
                            $stagiaireController->getStagiaireInfoC($stagiaireid);
                        }
                    }
                    break;
                case "modifystagiaire": {
                        if (isset($_GET["stagiaireid"])and $_GET["stagiaireid"] != '') {
                            $stagiaireid = $_GET["stagiaireid"];
                            $stagiaireController->loadFormForStagiaireModify($stagiaireid);
                        }
                    }
                    break;
                case 'startUpdatingStagiaire': {
                        if (isset($_GET["stagiaireid"])and $_GET["stagiaireid"] != '') {
                            $stagiaireid = $_GET["stagiaireid"];
                            $stagiaireController->modifyStagiaireC($stagiaireid);
                        }
                    }
                    break;
                case 'addnewstagiaire': {
                        $stagiaireController->loadFormToAddStagiaire();
                        if (isset($_POST['submit']) and $_POST['submit'] == 'addStagiaireGo') {
                            $stagiaireController->AddNewStagiaireC();
                        }
                    }
                    break;
                case 'addnewsession': {
                        $sessionController->loadFormToAddSession();
                        if (isset($_POST['submit']) and $_POST['submit'] == 'addSessionGo') {
                            $sessionController->AddNewSessionC();
                        }
                    }
                    break;
                case 'addmodule': {
                        $moduleController->loadAddMoudelForm();
                        if (!empty($_POST) ) {
                            $moduleController->addModuleControllerC();
                        }
                    }
                    break;
                default :{
                    $sessionController->afficheSessions();
                }
            }
        }
        
    }

}
