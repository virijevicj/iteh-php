<?php

    class Igrac{
        public $id;
        public $ime;
        public $prezime;
        public $pozicija;

        public function __construct($id, $ime, $prezime, $pozicija){
            $this->domacin_id = $domacin_id;
            $this->gost_id = $gost_id;
            $this->domacin_broj_poena = $domacin_broj_poena;
            $this->gost_broj_poena = $gost_broj_poena;
            $this->pobednik_id = $pobednik_id;
        }
    
        public static function get_all_players(mysqli $conn){
            // $query = "SELECT i.igrac_id, ime, prezime, pozicija, poeni, skokovi, asistencije, ukradene, izgubljene, blokade, minuti, broj_utakmica
            // FROM igrac i 
            // INNER JOIN
            // (SELECT igrac_id, ROUND (AVG(poeni),2) AS poeni , ROUND (AVG(skokovi),2) AS skokovi, ROUND (AVG(asistencije), 2) AS asistencije,
            //     ROUND (AVG(ukradene_lopte), 2) AS ukradene, ROUND(AVG(izgubljene_lopte),2) AS izgubljene , ROUND (AVG(blokade),2) AS blokade,
            //      ROUND(AVG(odigrani_minuti),2) AS minuti, COUNT(igrac_id) AS broj_utakmica
            // FROM igrac_statistika
            // GROUP BY igrac_id
            // ORDER BY igrac_id) a
            // ON i.igrac_id = a.igrac_id";
            $query = "select * from igrac";
            return $conn->query($query);
        }
        
        public static function get_player_stats($id, mysqli $conn){
            $query = "SELECT ROUND (AVG(poeni),2) AS poeni , ROUND (AVG(skokovi),2) AS skokovi, ROUND (AVG(asistencije), 2) AS asistencije,
                ROUND (AVG(ukradene_lopte), 2) AS ukradene, ROUND(AVG(izgubljene_lopte),2) AS izgubljene , ROUND (AVG(blokade),2) AS blokade,
                ROUND(AVG(odigrani_minuti),2) AS minuti
                FROM igrac_statistika
                WHERE igrac_id = {$id}";
            return $conn->query($query);
        }

    }
    

?>
