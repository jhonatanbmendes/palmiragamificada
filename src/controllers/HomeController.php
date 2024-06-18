<?php
namespace src\controllers;

use \core\Controller;
// use \src\handler\CandidatoHandler;
use \src\handler\VotosHandler;

class HomeController extends Controller {

    private $usuarioLogado;

    public function index() {

        $this->render('home');
    }

    public function relatorios(){
        
        $this->render('relatorios');
    }
    
    public function relatorioprefeito(){
        
        $lista = VotosHandler::listaVotoPrefeito();
        
        $this->render('relatorioprefeito', ['lista'=> $lista]);
    }
    
    public function relatoriovereador(){
        
        $lista = VotosHandler::listaVotoVereador();

        $this->render('relatoriovereador', ['lista'=> $lista]);
    }

    





    // public function sobre() {
    //     $this->render('adm/sobre');
    // }

    // public function sair(){
    //     $_SESSION['token'] = '';
    //     $this->redirect('/login');
    // }

    // public function sobreP($args) {
    //     print_r($args);
    // }

}