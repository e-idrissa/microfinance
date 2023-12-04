<?php
    class Compte {

        private $nom;
        private $prenom;
        private $phone;
        private $email;
        private $adresse;
        private $solde;
        private $etat;

        public function __construct($nom, $prenom, $phone, $email, $adresse, $solde, $etat)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->phone = $phone;
            $this->email = $email;
            $this->adresse = $adresse;
            $this->solde = $solde;
            $this->etat = $etat;
        }

        public function newCompte()
        {
            global $db;
            $result = false;
            // Variables
            $nom = $this->nom;
            $prenom = $this->prenom;
            $phone = $this->phone;
            $email = $this->email;
            $adresse = $this->adresse;
            $solde = $this->solde;
            $etat = "Actif";
            // Operations
            $req = "INSERT INTO compte(nom, prenom, phone, email, adresse, solde, etat) VALUES(?,?,?,?,?,?,?)";
            $stat = $db->prepare($req);
            $exec = $stat->execute(array($nom, $prenom, $phone, $email, $adresse, $solde, $etat));
            if ($exec) {
                $result = true;
            } else {
                echo "Erreur de creation de compte";
            }
            return $result;
        }

        static function getCompte($id)
        {
            global $db;
            // Operations
            $req = "SELECT * FROM compte WHERE id = :id";
            $stat = $db->prepare($req);
            $exec = $stat->execute([':id' => $id]);
            if ($exec) {
                if ($data = $stat->fetch()) {
                    $compte = new Compte(
                        $data['nom'],
                        $data['prenom'],
                        $data['phone'],
                        $data['email'],
                        $data['adresse'],
                        $data['solde'],
                        $data['etat']
                    );
                    return $compte;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }

        static function getComptes() {
            global $db;
            // Variables
            $comptes = [];
            // Operations
            $req = "SELECT * FROM compte ORDER BY nom ASC";
            $stat = $db->prepare($req);
            $exec = $stat->execute([]);
            if ($exec) {
                while ($data = $stat->fetch()) {
                    $compte = new Compte(
                        $data['nom'],
                        $data['prenom'],
                        $data['phone'],
                        $data['email'],
                        $data['adresse'],
                        $data['solde'],
                        $data['etat']
                    );
                    array_push($comptes, $compte);
                }
                return $comptes;
            } else {
                echo "Erreur de recupration";
            }
        }

        public function getId()
        {
            global $db;
            // Operations
            $req = "SELECT * FROM compte WHERE nom = :nom AND prenom = :prenom AND phone = :phone AND email = :email AND adresse = :adresse AND solde = :solde AND etat = :etat";
            $stat = $db->prepare($req);
            $exec = $stat->execute([
                ':nom' => $this->getNom(),
                ':prenom' => $this->getPrenom(),
                ':phone' => $this->getPhone(),
                ':email' => $this->getEmail(),
                ':adresse' => $this->getAdresse(),
                ':solde' => $this->getSolde(),
                ':etat' => $this->getEtat()
            ]);
            if ($exec) {
                if ($data = $stat->fetch()) {
                    $id = $data['id'];
                    return $id;
                } else {
                    return "non affecte";
                }
            } else {
                return "non execute";
            }
        }

        static function getComptesActifs()
        {
            global $db;
            // Variables
            $etat = "Actif";
            $comptes = [];
            // Operations
            $req = "SELECT * FROM compte WHERE etat = :etat";
            $stat = $db->prepare($req);
            $exec = $stat->execute([":etat" => $etat]);
            if ($exec) {
                while ($data = $stat->fetch()) {
                    $contact = new Compte(
                        $data['nom'],
                        $data['prenom'],
                        $data['phone'],
                        $data['email'],
                        $data['adresse'],
                        $data['solde'],
                        $data['etat']
                    );
                    array_push($comptes, $compte);
                }
                return $comptes;
            } else {
                return [];
            }
        }

        static function getIdActifs()
        {
            global $db;
            // Variables
            $etat = "Actif";
            // Operations
            $req = "SELECT * FROM compte WHERE nom = :nom AND prenom = :prenom AND phone = :phone AND email = :email AND adresse = :adresse AND solde = :solde";
            $stat = $db->prepare($req);
            $exec = $stat->execute([
                ':nom' => $this->getNom(),
                ':prenom' => $this->getPrenom(),
                ':phone' => $this->getPhone(),
                ':email' => $this->getEmail(),
                ':adresse' => $this->getAdresse(),
                ':solde' => $this->getSolde(),
                ':etat' => $etat
            ]);
            if ($exec) {
                if ($data = $stat->fetch()) {
                    $id = $data['id'];
                    return $id;
                } else {
                    return "non affecte";
                }
            } else {
                return "non execute";
            }
        }

        static function debitCompte($id, $montant)
        {
            global $db;
            $req = "SELECT solde FROM compte WHERE id = :id";
            $stat = $db->prepare($req);
            $stat->execute([':id' => $id]);
            $compte = $stat->fetch(PDO::FETCH_ASSOC);

            if ($compte) {
                $soldeActuel = $compte['solde'];
                // var_dump($montant);
                // Mettre à jour le solde du compte
                $nouveauSolde = $soldeActuel - $montant;
                $updateReq = "UPDATE compte SET solde = :nouveauSolde WHERE id = :id";
                $updateStat = $db->prepare($updateReq);
                $exec = $updateStat->execute([
                    ':nouveauSolde' => $nouveauSolde,
                    ':id' => $id
                ]);

                if ($exec) {
                    var_dump($nouveauSolde);
                    return $nouveauSolde;
                } else {
                    return "Erreur de debit";
                }
            } else {
                return "Compte introuvable";
            }
        }

        static function creditCompte($id, $montant)
        {
            global $db;
            $req = "SELECT solde FROM compte WHERE id = :id";
            $stat = $db->prepare($req);
            $stat->execute([':id' => $id]);
            $compte = $stat->fetch(PDO::FETCH_ASSOC);

            if ($compte) {
                $soldeActuel = $compte['solde'];
                // var_dump($montant);
                // Mettre à jour le solde du compte
                $nouveauSolde = $soldeActuel + $montant;
                $updateReq = "UPDATE compte SET solde = :nouveauSolde WHERE id = :id";
                $updateStat = $db->prepare($updateReq);
                $exec = $updateStat->execute([
                    ':nouveauSolde' => $nouveauSolde,
                    ':id' => $id
                ]);

                if ($exec) {
                    var_dump($nouveauSolde);
                    return $nouveauSolde;
                } else {
                    return "Erreur de crédit";
                }
            } else {
                return "Compte introuvable";
            }
        }

        static function supprimerCompte($id, $etat, $solde)
        {
            global $db;
            // Operations
            $req = "UPDATE compte SET etat = :etat, solde = :solde WHERE id = :id";
            $stat = $db->prepare($req);
            $exec = $stat->execute([
                ':etat' => $etat,
                ':solde' => $solde,
                ':id' => $id
            ]);
            if ($exec) {
                return $etat;
            } else {
                return "Erreur de suppression";
            }
        }

        static function getSoldeTotal()
        {
            global $db;
            // Operations
            $req = "SELECT SUM(solde) AS solde_total FROM compte";
            $stat = $db->prepare($req);
            $exec = $stat->execute();
            if ($exec) {
                while ($data = $stat->fetch()) {
                    $solde_total = $data['solde_total'];
                }
            }
            return $solde_total;
        }

        static function getNombreComptes()
        {
            global $db;
            // Operations
            $req = "SELECT COUNT(*) AS count FROM compte";
            $stat = $db->prepare($req);
            $exec = $stat->execute();
            if ($exec) {
                while ($data = $stat->fetch()) {
                    $count = $data['count'];
                }
            }
            return $count;
        }
 
        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getPhone()
        {
            return $this->phone;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getAdresse()
        {
            return $this->adresse;
        }

        public function getSolde()
        {
            return $this->solde;
        }

        public function getEtat()
        {
            return $this->etat;
        }
    }
?>