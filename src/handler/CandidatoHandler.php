<?php
namespace src\handler;

use \src\models\Candidato;


class CandidatoHandler {

    // FUNÇÃO PARA LISTAR PREFEITOS
    public static function getCandidatoPrefeito(){

        $dados = Candidato::select()->where('cargo','prefeito')->get();

        // $prefeitos = [];
        // foreach($dados as $dadosItem){
        //     $newCandidato = new Candidato();
        //     $newCandidato->id = $dadosItem['id'];
        //     $newCandidato->cargo = $dadosItem['cargo'];
        //     $newCandidato->numero = $dadosItem['numero'];
        //     $newCandidato->turma = $dadosItem['turma'];
        //     $newCandidato->nome01 = $dadosItem['nome01'];
        //     $newCandidato->imagem01 = $dadosItem['imagem01'];
        //     $newCandidato->nome02 = $dadosItem['nome02'];
        //     $newCandidato->imagem02 = $dadosItem['imagem02'];
            
        //     $prefeitos[] = $newCandidato;
        // }
        return $dados;
    }

    // FUNÇÃO PARA LISTAR VEREADORES
    public static function getCandidatoVereador(){

        $dados = Candidato::select()->where('cargo','vereador')->get();

        // $vereadores = [];
        // foreach($dados as $dadosItem){
        //     $newCandidato = new Candidato();
        //     $newCandidato->id = $dadosItem['id'];
        //     $newCandidato->cargo = $dadosItem['cargo'];
        //     $newCandidato->numero = $dadosItem['numero'];
        //     $newCandidato->turma = $dadosItem['turma'];
        //     $newCandidato->nome01 = $dadosItem['nome01'];
        //     $newCandidato->imagem01 = $dadosItem['imagem01'];
            
        //     $vereadores[] = $newCandidato;
        // }
        return $dados;
    }




}