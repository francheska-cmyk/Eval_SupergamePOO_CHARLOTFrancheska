<?php
// namespace View;

class ViewHome extends View{
    private ?string $message ="";
    private ?array $dataPlayers; 

    //GETTER ET SETTER
    public function getMessage():string{
        return $this->message;
    }
    public function setMessage(string $newMessage):self{
        $this->message = $newMessage;
        return $this;
    }
    public function getData():array{
        return $this->dataPlayers;
    }
    public function setData(array $newData):self{
        $this->dataPlayers = $newData;
        return $this;
    }

    //METHODS
    // methode pour afficher HTML de la page 
    public function displayMain():self{
        echo '
            <main>
                <h1>Ajouter un joueur</h1>
                <p>'.$this->message.'</p>
                <form action="" method="post">
                    <fieldset>
                        <label> Pseudo <input type="text" name="pseudo"></label>
                        <label> Score <input type="text" name="score"></label>
                        <select name="idTeam" aria-label="Sélectionner une team">
                            <option value="1">Aucune</option>
                            <option value="2">TeamRocket</option>
                            <option value="3">DreamTeam</option>
                        </select>
                        <input type="submit" value="Ajouter" name="submit">
                    </fieldset>
                </form>
            </main>';
        
        $listPlayers = '';
         foreach($this->dataPlayers as $row){
            $listPlayers .= "<li>{$row["pseudo"]} - Score : {$row["score"]} - Team : {$row["team"]}</li>";
         }
        echo '<ul>'.$listPlayers.'</ul>';
        return $this;
    }

    // Methode pour recompenser l'entièreté de la page
    public function displayAll():void{
        $this->displayHeader();
        $this->displayMain();
        $this ->displayFooter();
    }
}