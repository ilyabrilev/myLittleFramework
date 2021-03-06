<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 23.10.2018
 * Time: 15:57
 */

namespace Core;

use Core\Exceptions\DBConnectionException;

class DBConnection {

    private static $connections = [];

    private $pdo = null;

    private function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public static function GetInstance($conn = null, $allDbConf = null) : self {
        $confCon = $conn;
        if (!$conn) {
            $confCon = Environment::Get('DEFAULT_DB_CONNECTION', '', true);
        }
        if (array_key_exists($confCon, self::$connections)) {
            return self::$connections[$confCon];
        }
        if (!$allDbConf) {
            $allDbConf = Configuration::getDB();
        }
        if (!array_key_exists($confCon, $allDbConf)) {
            //ToDo: unique Exception
            throw new DBConnectionException("Missing connection $confCon in database.php configuration");
        }
        $dbConf = $allDbConf[$confCon];

        $pdo = new \PDO("{$dbConf['host_type']}={$dbConf['host']};dbname={$dbConf['dbname']}", $dbConf['user'], $dbConf['pass']);
        $obj = new self($pdo);
        self::$connections[$conn] = $obj;
        return $obj;
    }

    public function RawFetch($sql) {
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function RawFetchClass($sql, $class) {
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function GetIfPdoClassCreated() {
        return $this->pdo instanceof \PDO;
    }
}