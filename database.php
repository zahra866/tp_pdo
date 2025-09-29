<?php
class Database {
    // --- CONFIG MAMP (root / root, MySQL port 8889) ---
    private $host   = '127.0.0.1';
    private $port   = 8888;                           // MySQL MAMP (Apache est 8888)
    private $dbname = 'tp_pdo';
    private $user   = 'root';
    private $pass   = 'root';
    private $pdo    = null;

    // 1/ Connexion (TCP puis fallback socket MAMP)
    public function connexion() {
        if ($this->pdo !== null) return $this->pdo;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT            => 5,
        ];

        $dsnTcp  = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4";
        $dsnSock = "mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname={$this->dbname};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsnTcp, $this->user, $this->pass, $options);
            return $this->pdo;
        } catch (PDOException $e1) {
            // Tentative via socket si la connexion TCP échoue
            try {
                $this->pdo = new PDO($dsnSock, $this->user, $this->pass, $options);
                return $this->pdo;
            } catch (PDOException $e2) {
                die("Erreur de connexion : " . $e2->getMessage());
            }
        }
    }

    // 2/ Insertion
    public function addMember() {
        return "INSERT INTO member (lastname, firstname, email, city)
                VALUES (:lastname, :firstname, :email, :city)";
    }

    // 3/ Sélection (liste)
    public function selectAllMember() {
        return "SELECT * FROM member";
    }

    // 4/ Sélection par id (édition)
    public function selectMemberId() {
        return "SELECT * FROM member WHERE id = :id";
    }

    // 4/ Mise à jour
    public function updateMemberId() {
        return "UPDATE member
                   SET lastname = :lastname, firstname = :firstname, email = :email, city = :city
                 WHERE id = :id";
    }

    // 5/ Suppression
    public function deleteMemberId() {
        return "DELETE FROM member WHERE id = :id";
    }
}

