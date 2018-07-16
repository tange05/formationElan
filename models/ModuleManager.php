<?php

require_once 'Database.php';

class ModuleManager extends Database{

        public function getModuleCategories(){
            $categories = $this->select("SELECT ID_CAT, NOM_CAT FROM CAT");
            return $categories;
        }
        public function getAllModules(){
            $modules = $this->select("SELECT ID_MODULE, NOM_MODULE FROM MODULES");
            return $modules;
        }
        public function addModuleControllerM($moduleArray){
            if(!empty($moduleArray)){
                $query = "INSERT INTO `MODULES` (`ID_MODULE`, `NOM_MODULE`, `DSCP`, `ID_CAT`) VALUES 
                (NULL, :module, :DSCP, :CATID);";
                $bindingArray = 
                [
                    ":module" => $moduleArray["module"],
                    ":DSCP"   => $moduleArray["module"],
                    ":CATID"   => $moduleArray["cat"]
                ];
                return $this->insert($query,$bindingArray);
            }
        }

}
