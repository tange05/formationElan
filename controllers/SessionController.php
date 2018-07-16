<?php

class SessionController extends Controller{

  //here we get all sessions from SessionManager and display them
  public function afficheSessions(){
      $sessionManager    = $this->model('SessionManager');
      $sessionsArray     = $sessionManager->getAllSession();
      include 'views/session.php';
  }
  //here we get one session details and display them from SessionManager,StagiairesManager
public function afficheSessionInfo($sessionId,$param=''){
    if($param != '' and $param == 'newmodule'){
        $moduleManager     =  $this->model('ModuleManager');
        $modules           =  $moduleManager->getAllModules();
        $viewModules       =  $this->requireToVar('views/addModuleToSessionForm.php',$modules);
      }

    if($param != '' and $param == 'newstagiairetosession' ){
        $stagiaires = $this->model('StagiairesManager');  
        $stagiaires = $stagiaires->afficheStagiaires(); 
        $viewStagiaire = $this->requireToVar('views/addStagiaireToSessionForm.php', $stagiaires);
    }
        $sessionManager    = $this->model('SessionManager');
        $stagiairesManager = $this->model('StagiairesManager');
        $sessionInfo       = $sessionManager->getOneSession($sessionId);
        $programAsArray    = $sessionManager->getSessionProgram($sessionId);
        $stagiaires        = $stagiairesManager->afficheStagiaires($sessionId);
        $sessionInfo       = array(
            "sessionInfo"          => $sessionInfo,
            "sessionProgram"       => $programAsArray,
            "stagiairesForSession" => $stagiaires
         );

    include 'views/onesession.php';
}
  
  public function loadFormToAddSession(){
    include 'views/addSessionForm.php';
  }

  public function AddNewSessionC(){
    if(!empty($_POST)){
        $requieredFeilds = array(
            "titre",
            "data_debut",
            "date_fin",
            "nb_places"
          );          
          $sessionDataArray = $this->validateForm($_POST, $requieredFeilds);
          if(!empty($sessionDataArray)){
             $sessionManager = new SessionManager;
              $sucsess = $sessionManager->AddNewSessionM($sessionDataArray);
              if($sucsess > 0){
                  echo "Session has been Added!";
              }
          }

    }
  }

  public function index(){
    include 'views/index.php';
  }
}
