<?php

class ControllerHome extends Controller{
    //ATTRIBUTS
    //CONSTRUCTEUR

    //GETTER ET SETTER
    //METHODS
    public function displayPlayers():void{
        //1. Demander au model de récupérer la liste  des joueurs
        $data =$this ->getModel()->findAll(); 
        //2. donner les données à la view pour affichage 
        $this->getView()->setData($data); 
    }

    // methode pour enregistrer les données des joueurs via le formulaire 
      public function registerPlayer():void{
        //1. Vérifier qu'on reçoit bien le formulaire
        if(isset($_POST['submit'])){
            //2. sécuriser les données reçues avec sanitize
            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $idTeam = sanitize($_POST['idTeam']);

            //3. vérification avant enregistrement dans BDD
            if(!empty($pseudo) && is_numeric($score)){
                //4. Fournir au model les données du formulaire
                $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($idTeam);

            //4. Vérifier si le pseudo est libre
            if($this->getModel()->findByPseudo()){
                $this->getView()->setMessage("Ce pseudo est déjà utilisé.");
                    return;
                }
                //5. Effectuer l'enregistrement
                $this->getModel()->add();

                //6. Message de succès
                $this->getView()->setMessage("Le joueur a été ajouté avec succès !");
            } else {
                $this->getView()->setMessage("Veuillez remplir tous les champs correctement.");
            }
        }
    }
}

