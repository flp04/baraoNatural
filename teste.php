<?php
    class Pessoa{
        public $nome;
        public $data_nascimento;
        public $naturalidade;
        public $nacionalidade;

        public function setNome($nome){
            $nome = $_POST['nome'];
            return $this->$nome;
        }
        public function setDataNasc($data_nascimento){
            $data_nascimento = $_POST['data_nascimento'];
            return $this->$data_nascimento;
        }
        public function setNome($naturalidade){
            $naturalidade = $_POST['naturalidade'];
            return $this->$naturalidade;
        }
        public function setNome($data_nascimento){
            $data_nascimento = $_POST['data_nascimento'];
            return $this->$data_nascimento;
        }
        public function getNome(){
            return $this->$nome;
        }
        public function getDataNasc($data_nascimento){
            $data_nascimento = $_POST['data_nascimento'];
            return $this->$data_nascimento;
        }
        public function setNome($naturalidade){
            $naturalidade = $_POST['naturalidade'];
            return $this->$naturalidade;
        }
        public function setNome($data_nascimento){
            $data_nascimento = $_POST['data_nascimento'];
            return $this->$data_nascimento;
        }
    }

    class Head{
        public $linguagem;
        public $charset;
        public $name;
        public $content;
        public $css;
        public $fonts;

        public function setLinguagem($linguagem){
            $this->linguagem = $linguagem;
            return $this->linguagem;
        }
        public function getLinguagem(){
            return $this->linguagem;
        }
        public function setCharset($charset){
            $this->charset = $charset;
            return $this->charset;
        }
        public function getCharset(){
            return $this->charset;
        }
        public function setName($name){
            $this->name = $name;
            return $this->name;
        }
        public function getName(){
            return $this->name;
        }
        public function setContent($content){
            $this->content = $content;
            return $this->content;
        }
        public function getContent(){
            return $this->content;
        }
        public function setCss($css){
            $this->css = $css;
            return $this->css;
        }
        public function getCss(){
            return $this->css;
        }
        public function setLinguagem($linguagem){
            $this->linguagem = $linguagem;
            return $this->linguagem;
        }
        public function getLinguagem(){
            return $this->linguagem;
        }
        
        public function getHead();
        ?>
        <!doctype html>
            <html lang="<?php echo $this->get">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="css/main.css">
                <!-- Google Fonts-->
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
                <title>Barão Natural 1.0</title>
            </head>    
        ?>

        <!doctype html>
        <html lang="pt-BR">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <title>Barão Natural 1.0</title>
  </head>


    }
?>