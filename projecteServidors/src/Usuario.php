<?php

declare(strict_types=1);

class Usuario{
    private $id;
    private $nombre;
    private $contrasena;

    public function __construct(int $id, string $nombre, string $contrasena){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getId():int{
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre():string{
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getContrasena():string{
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena(string $contrasena){
        $this->contrasena = $contrasena;
    }
}
