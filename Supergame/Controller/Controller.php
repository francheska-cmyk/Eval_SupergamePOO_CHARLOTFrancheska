<?php
// namespace Controller;
// use Model\Model;
// use View\View;

//Class Controller regrouper le code commun à tous les Controller
class Controller{
    //ATTRIBUT
    private Model $model; 
    private View $view;

    //CONSTRUCTOR
    public function __construct(Model $model, View $view){
        $this->model = $model;
        $this->view = $view;
    }

    // GETTER ET SETTER
    public function getModel():Model{
        return $this->model;
    }

    public function setModel(Model $newModel):self{
        $this->model= $newModel;
        return $this;
    }

    public function getView():View{
        return $this->view;
    }

    public function setView(View $newView):self{
        $this->view = $newView;
        return $this;
    }

    //METHODS
    public function render():void{
        //1. Appel de la view pour afficher la méthode displayAll()
        $this->getView()->displayAll();
    }
}