<?php
namespace src\handler;

use \src\models\Votos;

class VotosHandler {

    // FUNÇÃO PARA ADICIONAR VOTOS
    public static function addVoto($tipo, $turno, $cargo, $id_candidato){
        Votos::insert([
            'tipo' => $tipo,
            'turno' => $turno,
            'cargo' => $cargo,
            'id_candidato' => $id_candidato
        ])->execute();

        return true;
    }

    public static function listaVotoPrefeito(){

        $dados = Votos::select(['candidato.nome01', 'votos.cargo', 'votos.tipo'])->join('candidato', 'candidato.id', '=','votos.id_candidato')->where('votos.cargo','vereador')->orderBy('candidato.nome01','desc')->get();
        
        $count = array_map(function($value){
            return $value['nome01'];
        },$dados);



        echo "<pre>";
        // var_dump($dados);
        var_dump(array_count_values($count));
        echo "</pre>";

            
        // return $dados;
        
    }
    public function listaVotoVereador(){
        
        $dados = Votos::select('c')->where('cargo','vereador')->get();

        return $dados;
        
    }




    public static function getAno($id){

        $pessoa = Pessoa::select()->where('id', $id)->one();

        $dados = Serie::select()->where('id', $pessoa['id_serie'])->one();

        return $dados['ano'];
    }

    public static function getPalavras($ano, $remove){
        if($remove === ''){
            if($ano == 1){
                $dados = Palavra::select()->where('serie_ano', $ano)->get();
            }else{
                $dados = Palavra::select()->where('serie_ano', 'in', [$ano, $ano-1])->get();
            }
        }else{
            if($ano == 1){
                $dados = Palavra::select()->where('serie_ano', $ano)->whereNotIn('id', $remove)->get();
            }else{
                $dados = Palavra::select()->where('serie_ano', 'in', [$ano, $ano-1])->whereNotIn('id', $remove)->get();
            }
        }
        
        $palavras = [];
        foreach($dados as $dadosItem){
            $newPalavra = new Palavra();
            $newPalavra->id = $dadosItem['id'];
            // $newPalavra->palavra = $dadosItem['palavra'];
            // $newPalavra->nivel = $dadosItem['nivel'];
            // $newPalavra->serie_ano = $dadosItem['serie_ano'];
            $newPalavra->arquivo = $dadosItem['arquivo'];

            $palavras[] = $newPalavra;
        }
        return $palavras;
    }

    public static function getEmojiFeliz(){
        $dados = Emoji::select()->where('tipo', 'feliz')->get();

        $emoji = [];
        foreach($dados as $dadosItem){
            $newEmoji = new Emoji();
            $newEmoji->id = $dadosItem['id'];
            $newEmoji->nome = $dadosItem['nome'];
            $newEmoji->tipo = $dadosItem['tipo'];
            $newEmoji->arquivo = $dadosItem['arquivo'];

            $emoji[] = $newEmoji;
        }
        return $emoji;
    }
    public static function getEmojiTriste(){
        $dados = Emoji::select()->where('tipo', 'triste')->get();

        $emoji = [];
        foreach($dados as $dadosItem){
            $newEmoji = new Emoji();
            $newEmoji->id = $dadosItem['id'];
            $newEmoji->nome = $dadosItem['nome'];
            $newEmoji->tipo = $dadosItem['tipo'];
            $newEmoji->arquivo = $dadosItem['arquivo'];

            $emoji[] = $newEmoji;
        }
        return $emoji;
    }





}