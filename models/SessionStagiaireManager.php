<?php
require_once 'Database.php';
class SessionStagiaireManager extends Database{
    
    public function addStagiaireToSessionM($sessionId,$stagiaireId){
        $valueToBind = array (
            ':idStagiaire' =>$stagiaireId,
            ':idSession'   =>$sessionId
             );
        $sucsses = $this->insert('INSERT INTO `SESSION_STAGIARE` '
                . '(`ID_STAGIAIRE`, `ID_SESSION`)'
                . ' VALUES (:idStagiaire, :idSession);',$valueToBind);
        return $sucsses;
    }
}