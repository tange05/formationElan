<?php

include 'models/StagiairesManager.php';

class StagiaireController extends Controller {
  //here we get all stagiaires from StagiairesManager and display them
  public function afficheStagiaires(){
      $stagiairesManager = new StagiairesManager;
      $stagiaires        = $stagiairesManager->afficheStagiaires();
      //including the template to display our stagiaire info
      include 'views/stagiaires.php';
  }

  //here we get one stagiaire detail and display them
  public function getStagiaireInfoC($stagiaireId){
      $stagiairesManager = new StagiairesManager;
      $sessionManager    = $this->model('SessionManager');
      $oneStagiairesInfo = $stagiairesManager->getStagiaireInfoM($stagiaireId);
      $sessionsArray = $sessionManager->getSessionForOneStagiaire($stagiaireId);
      include 'views/onestagiaire.php';
      if(!empty($sessionsArray))
      include 'views/session.php';
  }

  //this methode will load html form to update stagiare
  public function loadFormForStagiaireModify($stagiaireId){

    //here we check if we have stagiaire id if not we can't go further
    if(isset($stagiaireId) and $stagiaireId !== ''){
        //here we start stagiare manager so we can have all its methods
        $stagiairesManager = new StagiairesManager;
        //here we check if the stagiare we want to update is already exsiste in our database
        if($stagiairesManager->verifyIfStagiaireExsist($stagiaireId)){
            //if the stagiare exsiste we include html from so we can start updating this stagiare
            $oneStagiairesInfo = $stagiairesManager->getStagiaireInfoM($stagiaireId);
            include 'views/modifySragiaireForm.php';
      }else
        //here we display message incase the stagi we want to update dose not exsite in the database
        echo "Wrong Page";
    }else
        echo "Empty stagiaire ID";
  }

      //this methode will update stagiare by calling StagiaireMAnger model
      //also this methode will check if user input is vaild for our database
      public function modifyStagiaireC($stagiaireId){
        if(!empty($_POST)){
          //var_dump($_POST);
            $stagiairesManager = new StagiairesManager;
            if($stagiairesManager->verifyIfStagiaireExsist($stagiaireId)){
              $requieredFeilds = array(
                "name",
                "lastname",
                "sex",
                "mail",
                "telephone",
              );
              $stagiaireDataArray =  $this->validateForm($_POST, $requieredFeilds,'ID_STAGIAIRE', $stagiaireId);
            //here we gona start update if the user entered all required fields
            if(!empty($stagiaireDataArray)){
              //here we pass our new passed stagiaire  informations and his idebtification to
              //update methode inside StagiairesManager class so we can start update
              $sucsess = $stagiairesManager ->modifyStagiaireM($stagiaireId,$stagiaireDataArray);
              if($sucsess > 0){
                //we display message in case of sucsess
                echo "Stagiaire has been updated!";
              }else {
                echo "No change has been saved!";
              }

            }
          }
          else
            //if there is no record to be updated
            echo "Wrong Page";
        }else {
          //if user $_POST is empty
          echo "No user input!";
        }
    }

    //load html form to add new stagiaire
    public function loadFormToAddStagiaire(){
      include 'views/addStagiaireForm.php';
    }

    //here we gona add new stagiaireinside the database
    public function AddNewStagiaireC(){
      //checking if $_POST is empty ot not
      if(!empty($_POST)){
        //validating user input if ok we return an array of user input data
        $requieredFeilds = array(
          "name",
          "lastname",
          "sex",
          "mail",
          "telephone",
        );
        $stagiaireDataArray = $this->validateForm($_POST ,$requieredFeilds );

        //checking again if user data array is not empty
        if(!Empty($stagiaireDataArray)){
            // if its not empty hen we start adding the new record
            $stagiairesManager = new StagiairesManager;
            //executing add methode with the data from user input
            $sucsess  =   $stagiairesManager->AddNewStagiaireM($stagiaireDataArray);

            //checking if the operaion is a sucsse
            if($sucsess >0){
                //displying message to let the user know that the stagiaire has been added sucssfully
                echo "Stagiaire has been Added!";
            }
          }
       }
    }
    
}
