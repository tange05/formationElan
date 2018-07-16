
<?php

class ModuleController extends Controller{
        public function loadAddMoudelForm(){
            $moduleManager = $this->model("ModuleManager");
            $categories    = $moduleManager->getModuleCategories();
            $this->view("addModuleForm",$categories);
        }
        //here we add new module for our session 
        public function addModuleControllerC(){

            //cheking if there is any user input
            if(!empty($_POST)){
                //setting up the required field list for validation
                $requiredFeildArray = array("module");

                //validating userinput 
                $moduleArray = $this->validateForm($_POST, $requiredFeildArray);
                //if validation is ok we start the adding to database

                if(!empty($moduleArray)){
                    //getting ModuleManager to start the addition process
                    $moduleManager = $this->model("ModuleManager");
                    //adding the data to the database and sending back sucsses conformation
                    $sucsses       = $moduleManager->addModuleControllerM($moduleArray);
                    if( $sucsses  > 0 ){
                        echo "New module has been added!";
                    }
                }
            }
           

        }
        //loading user form to input data for the new module
        public function loadFormAddModuleToSessionC(){
            $sessionManager = $this->model("SessionManager");
            $moduleManager =  $this->model("ModuleManager");
            $session        = $sessionManager->getAllSession();
            $modules        = $moduleManager->getAllModules();
            $data           =[$session,$modules];
            $this->view("addModuleForm",$data);
        }
}
