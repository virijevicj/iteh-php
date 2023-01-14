<?php

    class Utakmica{
        public $id;
        public $domacin_id;
        public $gost_id;
        public $domacin_broj_poena;
        public $gost_broj_poena;
        public $pobednik_id;
        public $datum_odigravanja;
        public $vreme_odigravanja;
        

        public function __construct($domacin_id, $gost_id, $domacin_broj_poena, $gost_broj_poena, $pobednik_id, $datum_odigravanja, $vreme_odigravanja){
            $this->domacin_id = $domacin_id;
            $this->gost_id = $gost_id;
            $this->domacin_broj_poena = $domacin_broj_poena;
            $this->gost_broj_poena = $gost_broj_poena;
            $this->pobednik_id = $pobednik_id;
            $this->datum_odigravanja = $datum_odigravanja;
            $this->vreme_odigravanja = $vreme_odigravanja;
        }
        
    
        public static function get_all_games(mysqli $conn){
            $query = "SELECT a.utakmica_id, domacin, domacin_broj_poena, gost_broj_poena, gost, datum_odigravanja, vreme_odigravanja
            FROM
            (SELECT u.utakmica_id, f.naziv AS domacin, u.domacin_broj_poena, pobednik_id, datum_odigravanja, vreme_odigravanja
            FROM utakmica u
            INNER JOIN fakultet f ON u.domacin_id = f.fakultet_id)a
            INNER JOIN 
            (SELECT u.utakmica_id, f.naziv AS gost, u.gost_broj_poena
            FROM utakmica u
            INNER JOIN fakultet f ON u.gost_id = f.fakultet_id)b
            ON a.utakmica_id = b.utakmica_id
            ORDER BY utakmica_id
            ";

            return $conn->query($query);
        }
        

        public static function get_score(mysqli $conn){
            $query = "SELECT a.broj_utakmica, b.broj_pobeda, a.broj_utakmica - b.broj_pobeda AS broj_poraza
            FROM
            (SELECT COUNT(*) AS broj_utakmica
            FROM utakmica)a
            CROSS JOIN
            (SELECT COUNT(*) AS broj_pobeda
            FROM utakmica
            WHERE (domacin_id = 1 AND domacin_broj_poena > gost_broj_poena) OR (gost_id = 1 AND gost_broj_poena > domacin_broj_poena))b 
            ";

            return $conn->query($query);
        
        }
    
    }
    

?>
