<?php
include_once('config/ConfigConnexion.php');

class Connexion {
	
	private $pdo;

	private static $_instance = null;

	public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance;
    }

	/**
     * Fonction d'ouvrir une connexion à la base de données.
     */
    public function __construct() {
    	try {
			$this->pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}catch (PDOException $e) {
    		print "Erreur !: " . $e->getMessage() . "<br/>";
    		die();
		}
	}

	public function __destruct() {
        $this->pdo = null;
    }

	public function SelectQuery($query, $params) {
        try {
            $queryPrepared = $this->pdo->prepare($query);
            $queryPrepared->execute($params);
            return $queryPrepared->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Fonction permettant d'exécuter un select avec une seule réponse dans MySQL.
     * A utiliser pour les SELECT.
     * 
     * @param String $query. Requête à exécuter.
     * @param Array $params. Contient les paramètres à ajouter à la requête (null si aucun paramètre n'est requis)
     * @return la première ligne du select
     */
    public function SelectSingleQuery($query, $params) {
        try {
            $queryPrepared = $this->pdo->prepare($query);
            $queryPrepared->execute($params);
            return $queryPrepared->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Fonction permettant d'exécuter une requête MySQL.
     * A utiliser pour les UPDATE, DELETE, INSERT.
     *
     * @param String $query. Requête à exécuter.
     * @param Array $params. Contient les paramètres à ajouter à la requête  (null si aucun paramètre n'est requis)
     * @return le nombre de lignes affectées par la requête
     */
    public function executeQuery($query, $params) {
        try {
            $queryPrepared = $this->pdo->prepare($query);
            $queryPrepared->execute($params);
            return $queryPrepared->rowCount();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Fonction permettant d'obtenir le dernier id inséré.
     * 
     * @param String $table. la table où a été inséré l'objet. 
     * @return int: l'id du dernier élément inséré.
     */
    public function getLastId($table) {
        try {
            $lastId = $this->pdo->lastInsertId($table);
            return $lastId;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Méthode permettant de débuter une nouvelle transaction
     * 
     * @return bool: true si la transaction a bien débuté
     */
    public function startTransaction() {
        return $this->pdo->beginTransaction();
    }

    /**
     * Méthode permettant d'ajouter une requête à la transaction en cours
     * 
     * @return bool: true si la requête est fonctionnelle et qu'une transaction est bien en cours
     */
    public function addQueryToTransaction($query, $params) {
        $res = false;
        if ($this->pdo->inTransaction()) {
            $maQuery = $this->pdo->prepare($query);
            $res = $maQuery->execute($params);
        }
        return $res;
    }

    /**
     * Méthode permettant de valider la transaction
     * 
     * @return bool: true si la validation s'est correctement déroulée et qu'une transaction était bien en cours
     */
    public function commitTransaction() {
        $res = false;
        if ($this->pdo->inTransaction()) {
            $res = $this->pdo->commit();
        }
        return $res;
    }

    /**
     * Méthode permettant d'annuler la transaction
     * 
     * @return bool: true si la validation s'est correctement annulée et qu'une transaction était bien en cours
     */
    public function rollbackTransaction() {
        $res = false;
        if ($this->pdo->inTransaction()) {
            $res = $this->pdo->rollBack();
        }
        return $res;
    }
}

?>