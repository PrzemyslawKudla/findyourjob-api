<?php
/**
 * Created by PhpStorm.
 * User: Przemek
 * Date: 07.10.2017
 * Time: 17:55
 */

session_start();

class DBConnector
{

    public $db;
    public $jsonUtils;
    function __construct() {
        try
        {   require_once('JSONUtils.php');
            require_once 'connection_data.php';
            $this->db = new PDO('mysql:host='.$server_address.';dbname='.$db_name.';charset=utf8', $user_login
                , $user_password);
            $this->jsonUtils = new JSONUtils();
        }
        catch (PDOException $e)
        {
            print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public  function getTable($tableName) {
        $query = 'SELECT * FROM '.$tableName;
        $query = $this->db->query($query);
        $rows = array();

        if ($query != null) {
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }
            $this->jsonUtils->convert_to_json($rows,200,'Success, table downloaded');
            $query->closeCursor();
        }
        else {
            $this->jsonUtils->throwError(101,'Error while getting table');
        }
    }

    public function getRecordsByID($tableName, $id) {
        $query = 'SELECT * FROM '.$tableName. ' WHERE id='.$id;
        $query = $this->db->query($query);
        $rows = array();

        if ($query != null) {
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }
            $this->jsonUtils->convert_to_json($rows,200,'Success, record downloaded');
            $query->closeCursor();
        }
        else {
            $this->jsonUtils->throwError(101,'Error while getting record');
        }
    }

    public function deleteRecordById($tableName, $id) {
        $query = 'DELETE FROM '.$tableName.' WHERE id='.$id;
        $query = $this->db->query($query);
        $rows = array();

        if ($query != null) {  // napraw błąd - nie działa obsługa błędów
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }
            $this->jsonUtils->convert_to_json($rows,200,'Success, record deleted');
            $query->closeCursor();
        }
        else {
            $this->jsonUtils->throwError(101,'Error while deleting record');
        }
    }

    public function doStandardQuery($queryString) {

    }

    public function doExec($execQuery) {

    }
}


