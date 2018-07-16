<?php

require_once 'Database.php';

class SessionManager extends Database  {

    //getting all session information
    public function getAllSession() {
        //connection to database with database object
        $conectionBaseDeDonner = $this->dbConnect();

        //getting all session information
        $pdoStatement = $conectionBaseDeDonner->prepare('SELECT s.ID_SESSION,s.TITRE, s.DATE_DEBUT, s.DATE_FIN, s.NB_PLACES, COUNT(st.ID_STAGIAIRE) as STAGIAIRES
                                                                FROM SESSION s
                                                                LEFT JOIN SESSION_STAGIARE st
                                                                on  s.ID_SESSION = st.ID_SESSION
                                                                GROUP by s.ID_SESSION;');
        $pdoStatement->execute();
        $sessionArray = $pdoStatement->fetchAll();
        //sending back to controller all session iformation
        return $sessionArray;
    }
    //getting one session information with its program and all the participant
    public function getOneSession($sessionId) {

        //connection to database with database object
        $conectionBaseDeDonner = $this->dbConnect();

        //getting information for one session from the database by its id
        $pdoStatement = $conectionBaseDeDonner->prepare("SELECT s.ID_SESSION, s.TITRE,
                                                                s.DATE_DEBUT, s.DATE_FIN,s.NB_PLACES, s.DSCP
                                                                FROM SESSION s
                                                                WHERE s.ID_SESSION = :id");
        //executing the query and binding id value
        $pdoStatement->execute([":id" => $sessionId]);

        //getting all the result from PDO statement
        $getSessionInfo = $pdoStatement->fetch();

        //sending back our query result to the controller
        return $getSessionInfo;
    }

    public function getSessionProgram($sessionId) {
        //getting our Database connection
        $conectionBaseDeDonner = $this->dbConnect();

        //here we get the session in question and All the cats for its models
        //i did this so i can get all the seesion models as children to cat element in array
        $pdoStatement = $conectionBaseDeDonner->prepare("SELECT s.id_session, c.id_cat , c.nom_cat
                                                                    FROM SESSION s, MODULES m , SESSION_MODULE mm, CAT c
                                                                    where s.ID_SESSION = mm.ID_SESSION
                                                                    and   m.ID_MODULE  = mm.ID_MODULE
                                                                    and   c.ID_CAT = m.ID_CAT
                                                                    AND   s.ID_SESSION = :id
                                                                    GROUP BY c.nom_cat");
        $pdoStatement->execute([":id" => $sessionId]);
        $getCatsAndSessionForModels = $pdoStatement->fetchAll();

        //here we gona bring all the models that in that session and their cats
        foreach ($getCatsAndSessionForModels as $key => $val) {
            $getModelsForCatsSession = $conectionBaseDeDonner->query("SELECT m.ID_MODULE ,m.NOM_MODULE, mm.NB_JOURS
                                                                            FROM SESSION s, MODULES m , SESSION_MODULE mm, CAT c
                                                                            where s.ID_SESSION = mm.ID_SESSION
                                                                            and   m.ID_MODULE  = mm.ID_MODULE
                                                                            and   c.ID_CAT = m.ID_CAT
                                                                            AND s.ID_SESSION ={$val['id_session']}
                                                                            AND c.id_cat     ={$val['id_cat']}
                                                                            ");

            $modelsArray = $getModelsForCatsSession->fetchAll();
            $getCatsAndSessionForModels[$key]["models"] = $modelsArray;
        }
        return $getCatsAndSessionForModels;
    }

    //this method  will get all the session for for one stagiaire
    public function getSessionForOneStagiaire($stagiaireId){
      $conectionBaseDeDonner = $this->dbConnect();
      $pdoStatement          =$conectionBaseDeDonner->prepare("SELECT s.ID_SESSION,s.TITRE, s.DATE_DEBUT, s.DATE_FIN, s.NB_PLACES, COUNT(st.ID_STAGIAIRE) as STAGIAIRES
                                                              FROM SESSION s, SESSION_STAGIARE st
                                                              WHERE s.ID_SESSION = st.ID_SESSION
                                                              AND   st.ID_STAGIAIRE = :id
                                                              GROUP by s.ID_SESSION;");
      $pdoStatement->execute(["id" => $stagiaireId]);
      $sesstionForOneStagiaireArray          = $pdoStatement->fetchAll();
      return  $sesstionForOneStagiaireArray;

    }

}
