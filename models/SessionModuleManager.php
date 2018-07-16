<?php
require_once 'Database.php';

class SessionModuleManager extends Database{
        public function addModuleToSessionM($module,$sessionId){
            var_dump($module);
            var_dump($sessionId);
        $valeusToBind = array(
          ":idSession" => $sessionId,  
          ":idModule"  => $module['module'], 
          ":nbJours"   =>  $module['nbjours'], 
          
        );
        $query = "INSERT INTO `SESSION_MODULE` "
            . "(`ID_SESSION`,"
            . " `ID_MODULE`, "
            . "`NB_JOURS`) "
            . "VALUES "
            . "(:idSession, :idModule, :nbJours);";
            $sucsses = $this->insert($query, $valeusToBind);
            return $sucsses;
    }
}
