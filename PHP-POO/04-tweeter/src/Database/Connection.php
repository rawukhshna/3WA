<?php


namespace Twitter\Database;

use PDO;

/**
 * Renvoie au PDO
 */
class Connection
{
    protected string $host;
    protected string $dbname;
    protected string $user;
    protected string $password;
    protected int $port;
    protected PDO $pdo;

    /**
     * fonction constructrice de la classe Connexion, permettant de définir les paramètres du PDO
     *
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $password
     * @param integer $port
     */
    public function __construct(string $host, string $dbname, string $user, string $password, int $port = 3306)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
    }
    /**
     * retourne le PDO
     *
     * @return PDO
     */
    public function getPdo(): PDO
    {
        if (empty($this->pdo)) {
            $this->pdo = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=UTF8", $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }


        return $this->pdo;
    }

    public function execute(string $sql, array $params = [])
    {

        $pdo = $this->getPDO();

        $query = $pdo->prepare($sql);
        $query->execute($params);

        return $query;
    }

    public function query(string $sql, array $params = [])
    {
        return $this->execute($sql, $params)->fetch();
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->execute($sql, $params)->fetchAll();
    }

    public function getLastInsertId()
    {
        return $this->getPdo()->lastInsertId();
    }
}
