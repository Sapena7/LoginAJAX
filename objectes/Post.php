<?php


class Post{

    private $id;
    private $titol;
    private $contingut;
    private $data;
    private $autor;

    function __construct(int $id, string $titol, string $contingut, date $data, string $autor) {
        $this->id = $id;
        $this->titol = $titol;
        $this->contingut = $contingut;
        $this->data = $data;
        $this->autor = $autor;
    }

    public function render() {
       echo "ID: " . $this->id .
           " Titol: " . $this->titol .
           " Contingut: " . $this->contingut .
           " Data: " . $this->data .
           " Autor: " .$this->autor;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitol() {
        return $this->titol;
    }
    public function getContingut() {
        return $this->contingut;
    }
    public function getData() {
        return $this->data;
    }
    public function getAutor() {
        return $this->autor;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setTitol($titol) {
        $this->titol = $titol;
    }
    public function setContingut($contingut) {
        $this->contingut = $contingut;
    }
    public function setData($data) {
        $this->data = $data;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }

    function __clone(){
        echo "s'ha clonat un objecte";
    }

}