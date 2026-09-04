<?php
//Class ModelPlayer
// namespace Model;

// use Model\Model;
// use PDO;
// use EXCEPTION; 

class ModelPlayer extends Model{
    //ATTRIBUTS
    private ?int $id; 
    private ?string $pseudo;
    private ?int $score;
    private ?string $team;
    private ?int $idTeam;

    //CONSTRUCTEUR
    // public function __construct(?string $team){
    //     $this->team = $team;

    // }

    //getter & setter

    public function getPseudo():?string{
        return $this->pseudo;
    }

    public function setPseudo(string $newPseudo):self{
        $this->pseudo = $newPseudo;
        return $this;
    }

    public function getScore():?int{
        return $this->score;
    }

    public function setScore(int $newScore):self{
        $this->score = $newScore;
        return $this;
    }

    public function getIdTeam():?int{
        return $this->idTeam;
    }

    public function setIdTeam(int $newIdTeam):self{
        $this->idTeam = $newIdTeam;
        return $this;
    }


    //Methods
    public function findAll():?array{
        try{
            //1. Préparer une requête pour SELECT les joueurs
            //On utilise l'objet PDO stocké dans l'attribut bdd de notre model ($this->bdd)
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON t.id_team = p.id_team');

            //2. Exécution de la requête
            $req->execute();

            //3. Return des données joueurs
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function findByPseudo():array | bool {
        try{
            //1. Preparation de la requête
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON t.id_team = p.id_team WHERE p.pseudo = ?');

            //2. binding param pour relier "?" à la donnée à enregistrer
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);

            //3. Exécuter la requête
            $req->execute();

            //4. Retourner la réponse de la BDD
            return $req->fetch(PDO::FETCH_ASSOC);
            
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function add(){
        try{
            //1. Preparation de la requête
            $req = $this->getBDD()->prepare('INSERT INTO player (pseudo,score, id_team) VALUES (?,?,?)');

            //2. binding param pour relier "?" à la donnée à enregistrer
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);

             //3. Exécuter la requête
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }


    public function delete(){
        try{
            //1. Preparation de la requête
            $req = $this->getBDD()->prepare('DELETE FROM player WHERE id = ?');

            //2. binding param pour relier "?" à la donnée à enregistrer
            $req->bindParam(1,$this->id,PDO::PARAM_INT);

             //3. Exécuter la requête
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }


        public function update(){
        try{
            //1. Preparation de la requête
            $req = $this->getBDD()->prepare('UPDATE player SET pseudo = ?, score = ?, id_team = ?  WHERE id_player = ?');

            //2. bindin param pour  relier "?" aux données à enregistrer
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);
            $req->bindParam(4,$this->id,PDO::PARAM_INT);

             //3. Exécuter la requête
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

}