<?php 

class Servico{
    public $id;
    public $nomedolivro;
    public $descricao;
    public $resumo;
    public $autor;
    public $imagem;
    public $tipolivro;

    public function __construct($id,$nomedolivro,$descricao,$resumo,$autor,$imagem,$tipolivro){
        $this->id = $id;
        $this->nomedolivro = $nomedolivro;
        $this->descricao = $descricao;
        $this->resumo = $resumo;
        $this->autor = $autor;
        $this->imagem = $imagem;
        $this->tipolivro = $tipolivro;
    }




}
