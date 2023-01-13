<?php

    class Utakmica{
        public $id;
        public $domacin_id;
        public $gost_id;
        public $domacin_broj_poena;
        public $gost_broj_poena;
        public $pobednik_id;

        public function __construct($domacin_id, $gost_id, $domacin_broj_poena, $gost_broj_poena, $pobednik_id){
            $this->domacin_id = $domacin_id;
            $this->gost_id = $gost_id;
            $this->domacin_broj_poena = $domacin_broj_poena;
            $this->gost_broj_poena = $gost_broj_poena;
            $this->pobednik_id = $pobednik_id;
        }
        
    
        public static function get_all_games(mysqli $conn){
            $query = "SELECT a.utakmica_id, domacin, domacin_broj_poena, gost_broj_poena, gost
            FROM
            (SELECT u.utakmica_id, f.naziv AS domacin, u.domacin_broj_poena, pobednik_id
            FROM utakmica u
            INNER JOIN fakultet f ON u.domacin_id = f.fakultet_id)a
            INNER JOIN 
            (SELECT u.utakmica_id, f.naziv AS gost, u.gost_broj_poena
            FROM utakmica u
            INNER JOIN fakultet f ON u.gost_id = f.fakultet_id)b
            ON a.utakmica_id = b.utakmica_id";

            return $conn->query($query);
        }
    
    
    }
    

?>
