<?php

namespace PHPSHOP\DB;


class DB
{


    private static function getConnect()
    {
        $connection = new \PHPSHOP\Connection;
        return $connection->getConnection();
    }

    /**
     * Insert a new DB record
     *
     * @param string $tableName
     * @param array  $data      
     * 
     * @return bool
     */
    public static function insert($tableName, $data)
    {

        // Check that data is array
        if (!is_array($data)) return false;

        // CHeck that that the length of data is greather than 0
        if (is_array($data) && count($data) == 0) return false;

        // Check if table name is not set or empty 
        if (!isset($tableName) || empty($tableName)) return false;

        $keys = array_keys($data);

        $columenNames = implode(",", $keys);

        $sql_stmt = "INSERT INTO " . $tableName . "(" . $columenNames . ") values(";

        $sqlValues = array_values($data);

        foreach ($sqlValues as $value) {
            if ($value == $sqlValues[count($sqlValues) - 1])
                $sql_stmt .= "?)";
            else
                $sql_stmt .= "?,";
        }

        self::prepare($sql_stmt);
    }

    /**
     * Insert many DB record 
     *
     * @param string $tableName
     * @param array  $data     
     * 
     * @return bool
     */
    public static function insertMany($tableName, $data)
    {
    }


    /**
     * Update a db record 
     *
     * @param string $tableName  
     * @param array  $data        
     * @param array  $whereSQL    
     * @param array  $whereValues 
     * 
     * @return void
     */
    public static function update($tableName, $data, $whereSQL, $whereValues = [])
    {
    }

    /**
     * Delete record from DB
     *
     * @param string $tableName 
     * @param int    $id        
     * 
     * @return bool
     */
    public static function delete($tableName, $id)
    {

        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        $query =  self::prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        return $query->affected_rows > 0;
    }


    /**
     * Prepare SQL statement
     *
     * @param string $sql 
     * 
     * @return \mysqli_stmt|false
     */
    public static function prepare(string $sql): \mysqli_stmt|false
    {
        $query = self::getConnect()->prepare($sql);
        return $query;
    }
    /**
     * Undocumented function
     *
     * @param string $sql 
     * 
     * @return \mysqli_result
     */
    public static function query(string $sql): \mysqli_result
    {
        $query = self::getConnect()->query($sql);
        return $query;
    }
}
