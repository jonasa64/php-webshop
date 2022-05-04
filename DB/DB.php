<?php 

class DB{
    /**
     * Insert a new DB record
     *
     * @param string $tableName
     * @param array $data
     * @return bool
     */
    public static function insert($tableName, $data){

    }

    /**
     * Insert many DB record 
     *
     * @param string $tableName
     * @param array $data
     * @return bool
     */
    public static function insertMany($tableName, $data){

    }

    public static function update($tabbleName, $data, $whereSQL, $whereValues = []){

    }

    /**
     * Prepare SQL statement
     *
     * @param string $sql
     * @return mysqli_stmt|false
     */
    public static function prepare($sql){
    }


}