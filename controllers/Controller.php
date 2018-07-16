<?php
class Controller{
        //Load model file

        public function model($model) {
            //require model file 
            require_once 'models/' . $model . '.php';
            //instatiate
            return new $model();
        }
    
        public function view($view, $data = []) {
            //check for view filei
            if (file_exists('views/' . $view . '.php')) {
                require_once 'views/' . $view . '.php';
            } else {
    
                die('view can not be found');
            }
        }
        
        //this function will take view and dump all its content inside a var.
        public function requireToVar($file,$data){
            ob_start();
            require($file);
            return ob_get_clean();
        }
    public function validateForm($data , $requieredFeilds , $recordIdName='' , $recordIdValue=''){
        //here we store error messages for required feilds
        $requieredFeildErrorMsg ='';
        //here we will store the count of the fields that is empty
        $emptyFieldCount = 0;
        //here we gona store the new stagiaire data rom html from .
        if($recordIdName != '')
        $stagiaireDataArray [$recordIdName] = $recordIdValue;
            //checking if there is user input
            if(!empty($data)){
                //looping inside user input to check for required field
                foreach($_POST as $key => $val){
                  //checking if any input is empty
                      // here we consider all our input as required
                      if(in_array($key,$requieredFeilds)){
  
                          if($val == ''){
                            //if there is empty feild then we count it
                            $emptyFieldCount ++;
                            //storing a message to notify user that he should fill the missing feild
                            $requieredFeildErrorMsg .= 'The filed ('.$key.') is required<br>';
                          }else{
                            //here we are storing all input values from user input inside an array
                            $stagiaireDataArray[$key] = trim(htmlentities($val));
                          }
                    }else {
                      $stagiaireDataArray[$key] = trim(htmlentities($val));
                    }
              }
              if($emptyFieldCount > 0 )
              {
                echo $requieredFeildErrorMsg ;
                return 0;
              }
              return   $stagiaireDataArray;
          }
    }
      public function index(){
          include 'views/index.php';
    }
  
}