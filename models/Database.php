<?php

class Database{
    
    protected function dbConnect(){
        
        try{
            //variables de connexion
            $host = 'phpmyadmin.elan-formation.eu';
            $dbname = 'yasir_session';
            $user = 'y_alqaisi';
            $password = 'elanformation67';
            
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8;',$user,$password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        }
        catch(PDOException $e){
            echo 'Echec lors de la connexion : '.$e->getMessage();
        }
    }
    
    public function select($query, $valeusToBind=''){
        //here we create connection to database via PDO
        $conectionToDatabase = $this->dbConnect();
        
        //preparing our sql for executing 
        $PDOStatment         = $conectionToDatabase ->prepare($query);
        //execute the query
        if(!empty($valeusToBind))
        $PDOStatment->execute($valeusToBind);
        else
        $PDOStatment->execute();
            
        
        //fetching database results
        $result              = $PDOStatment->fetchAll();
        return $result;
    }
    
    public function update(){
        
    }
    public function insert($query, $valeusToBind ){
        try{
         $conectionToDatabase = $this->dbConnect();
         $PDOStatment         = $conectionToDatabase->prepare($query);
         $PDOStatment->execute($valeusToBind);
         return $PDOStatment->rowCount();
        }
        catch (PDOException $ex){
            return 0;
        }
    }
    public function delete(){
        
    }
}