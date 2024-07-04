<?php
class ConexionCarrito {
    private $productos;

    public function __construct() {
        $this->productos = [];
    }

    public function agregarProducto($producto) {
        array_push($this->productos, $producto);
    }

    public function obtenerProductos() {
        return $this->productos;
    }
}
?>