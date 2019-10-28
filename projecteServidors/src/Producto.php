<?php

declare(strict_types=1);

class Producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $marca;
    private $categoria;
    private $etiqueta;

    public function __construct(int $id, string $nombre, string $descripcion, double $precio, int $marca, int $categoria, int $etiqueta){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->marca = $marca;
        $this->categoria = $categoria;
        $this->etiqueta = $etiqueta;
    }

    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id){
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string{
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string{
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }

    /**
     * @return float
     */
    public function getPrecio(): float{
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio){
        $this->precio = $precio;
    }

    /**
     * @return int
     */
    public function getMarca(): int{
        return $this->marca;
    }

    /**
     * @param int $marca
     */
    public function setMarca(int $marca){
        $this->marca = $marca;
    }

    /**
     * @return int
     */
    public function getCategoria(): int{
        return $this->categoria;
    }

    /**
     * @param int $categoria
     */
    public function setCategoria(int $categoria){
        $this->categoria = $categoria;
    }

    /**
     * @return int
     */
    public function getEtiqueta(): int{
        return $this->etiqueta;
    }

    /**
     * @param int $etiqueta
     */
    public function setEtiqueta(int $etiqueta){
        $this->etiqueta = $etiqueta;
    }


}