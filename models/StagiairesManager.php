<?php
require_once 'Database.php';

class StagiairesManager extends Database {

    public function afficheStagiaires($sessionId=''){
         $conectionBaseDeDonner = $this->dbConnect();
         if($sessionId == ''){
         $pdoStatement        = $conectionBaseDeDonner->prepare("SELECT ID_STAGIAIRE, NOM , PRENOM
             , TELEPHONE,MAIL,VILLE
               FROM STAGIAIRES ");
         $pdoStatement->execute();
       }else{
                $pdoStatement = $conectionBaseDeDonner->prepare("SELECT st.ID_STAGIAIRE, st.NOM , st.PRENOM , st.TELEPHONE, st.MAIL , st.VILLE
                                                                    FROM STAGIAIRES st , SESSION s, SESSION_STAGIARE stt
                                                                    WHERE s.ID_SESSION = stt.ID_SESSION
                                                                    and   st.ID_STAGIAIRE = stt.ID_STAGIAIRE
                                                                    and s.ID_SESSION = :id");
                $pdoStatement->execute([":id" => $sessionId]);
         }
         $getStagiaires = $pdoStatement->fetchAll();

         return $getStagiaires;

    }
    public function getStagiaireInfoM($stagiaireId){
         $conectionBaseDeDonner = $this->dbConnect();
         $pdoStatement        = $conectionBaseDeDonner->prepare(
              "SELECT ID_STAGIAIRE, NOM , PRENOM, cp , adresse,sex,ville
             , TELEPHONE,MAIL,VILLE
               FROM STAGIAIRES
               WHERE ID_STAGIAIRE = :id");
         $pdoStatement->execute([":id" => $stagiaireId]);
         $oneStagiairesInfo = $pdoStatement->fetch();
         return $oneStagiairesInfo;
    }

    public function modifyStagiaireM($stagiaireId , $data){
        $conectionBaseDeDonner= $this->dbConnect();
        $PDOStatement          = $conectionBaseDeDonner->prepare(
           "UPDATE `STAGIAIRES` SET
           `NOM` = :nom,
           `PRENOM` = :prenom,
           `SEX` = :sex,
           `MAIL` = :mail,
           `TELEPHONE` = :telephone,
           `VILLE` = :ville,
           `ADRESSE` = :adresse,
           `CP` = :cp
            WHERE `STAGIAIRES`.`ID_STAGIAIRE` = :id;"
          );
            $PDOStatement->execute(array(
              ":id"  => $data['ID_STAGIAIRE'],
              ":nom" => $data['lastname'],
              ":prenom" => $data['name'],
              ":sex" => $data['sex'],
              ":telephone" => $data['telphone'],
              ":mail" => $data['mail'],
              ":cp" => $data['cp'],
              ":ville" => $data['city'],
              ":adresse" =>$data['adresse'],
            ));
            $updatedRowsCount = $PDOStatement->rowCount();
            return $updatedRowsCount;

    }

    public function verifyIfStagiaireExsist($stagiaireId){
      $conectionBaseDeDonner =  $this->dbConnect();
      $pdoStatement          = $conectionBaseDeDonner->prepare("SELECT ID_STAGIAIRE
                                                                FROM STAGIAIRES
                                                                WHERE ID_STAGIAIRE = :id");
      $pdoStatement->execute([":id" => $stagiaireId ]);
      if($pdoStatement->rowCount() > 0)
        return 1;

        return 0;
    }
}
