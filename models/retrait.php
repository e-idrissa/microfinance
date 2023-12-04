<?php
    class Retrait {

        private $created_at;
        private $compte;
        private $montant;
        private $op;

        public function __construct($created_at, $compte, $montant, $op)
        {
            $this->created_at = $created_at;
            $this->compte = $compte;
            $this->montant = $montant;
            $this->op = $op;
        }

        public function newRetrait()
        {
            global $db;
            // Variables
            $result = false;
            $created_at = $this->created_at;
            $compte = $this->compte;
            $montant = $this->montant;
            $op = "retrait";
            // Operations
            $req = "INSERT INTO retrait(created_at, compte, montant, op) VALUES(?,?,?,?)";
            $stat = $db->prepare($req);
            $exec = $stat->execute(array($created_at, $compte, $montant, $op));
            if ($exec) {
                $result = true;
            } else {
                echo "Erreur lors de l'enregistrement";
            }
            return $result;
        }

        static function getTotal()
        {
            global $db;

            try {
                // Opérations
                $req = "SELECT SUM(montant) AS solde_total FROM retrait";
                $stat = $db->prepare($req);
                $stat->execute();

                // Utilisation de fetchColumn pour récupérer directement la valeur de la colonne
                $solde_total = $stat->fetchColumn();

                return $solde_total !== false ? $solde_total : 0; // Assurez-vous de renvoyer 0 si la requête ne renvoie rien
            } catch (PDOException $e) {
                // Gestion des erreurs PDO
                error_log("Erreur PDO dans getTotal : " . $e->getMessage());
                return 0; // Retourner une valeur par défaut en cas d'erreur
            }
        }

        public function getCreatedAt()
        {
                return $this->created_at;
        }
 
        public function getCompte()
        {
                return $this->compte;
        }
 
        public function getMontant()
        {
                return $this->montant;
        }
    }
?>