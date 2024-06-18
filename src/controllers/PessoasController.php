<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Pessoa;

class PessoasController extends Controller {

    public function scannerPessoa() {

        $this->render('scanner');
    }
    
    public function addScanner(){
        $nome = filter_input(INPUT_POST, 'nome');
        $pontos = filter_input(INPUT_POST, 'pontos');
        
        
        $dados = Pessoa::select()->where('nome', $nome)->one();

        $valor = $dados['pontos'];
        $valor += $pontos;
        echo $valor;
        
        Pessoa::update()->set('pontos', $valor)->where('id',$dados['id'])->execute();
        
        echo "Passou";
    }
    


}