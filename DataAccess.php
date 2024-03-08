<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataAccess
 *
 * @author Admin
 */
class DataAccess {
    //1-methode connection
        public static  function connextion()
                {
                try  {
                   $bdd = new PDO('mysql:host=localhost;dbname=goodtravel;charset=utf8', 'root', '');
	    $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                   return $bdd;
                   }
               catch (Exception $e)
                   {
        echo('Erreur : ' . $e->getMessage());
                   }
                }

                private static $pdo;

                // Method to get the PDO instance
                public static function getPDOInstance() {
                    // Check if PDO instance is already created
                    if (!isset(self::$pdo)) {
                        // Replace 'your_db_name', 'your_username', and 'your_password' with your actual database credentials
                        $dsn = 'mysql:host=localhost;dbname=goodtravel;charset=utf8mb4';
                        $username = 'root';
                        $password = '';
            
                        // Create a new PDO instance
                        self::$pdo = new PDO($dsn, $username, $password);
                        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
            
                    // Return the PDO instance
                    return self::$pdo;
                }
            
                // Method for prepared statements
                public static function prepareAndExecute($query, $params = array()) {
                    try {
                        $pdo = self::getPDOInstance();
                        $stmt = $pdo->prepare($query);
                        
                        foreach ($params as $key => $value) {
                            $stmt->bindValue($key, $value);
                        }
            
                        $stmt->execute();
            
                        return $stmt;
                    } catch (PDOException $e) {
                        // Handle the exception (e.g., log, show an error message)
                        throw new Exception("Error: " . $e->getMessage());
                    }
                }
    //2-Methode de mise à jour
        public static function miseajour($req)
                {
       try  {
                   $bdd= Dataaccess::connextion() ;
                   $maj=$bdd->exec($req);
                   return $maj;
                    }
               catch (Exception $e)
                   {
        echo('Erreur : ' . $e->getMessage());
                   }  $bdd=null;
                }

    //3-Methode de selection

        public static function selection($req)
                {
            try{
            $bdd=self::connextion() ;
            $rep=$bdd->query($req);
return $rep ;
                 }
               catch (Exception $e)
                   {
        echo('Erreur : ' . $e->getMessage());
                   }  $bdd=null;

       }  

    
}
