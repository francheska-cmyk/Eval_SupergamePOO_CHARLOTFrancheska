<?php
// namespace View;
class View {
    // //ATTRIBUTS

    //GETTER et SETTER
   

    // METHODS 
    public function displayHeader():self{
        echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Supergame </title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
            </head>
            <body>
                <header>
                <h1> Supergame </h1>
                </header>';
            return $this;}
            
    public function displayFooter(): self {
        echo '<footer>
            <p>Tous droits réservés Supergame</p>
            </footer>
            </body>
            </html>';
        return $this;}
    }
    
?>
