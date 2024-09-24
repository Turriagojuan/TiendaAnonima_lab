<?php
require_once ("./persistencia/Conexion.php");
require_once ("./persistencia/ProductoDAO.php");
require_once ("./logica/Categoria.php");
require_once ("./logica/Marca.php");
class Producto{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $idMarca;
    private $idCategoria;

    public function getIdMarca() {
        return $this->idMarca;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioCompra () {
        return $this->precioCompra;
    }

    public function getPrecioVenta () {
        return $this->precioVenta;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }
    
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
    public function setIdMarca($idMarca){
        $this->idMarca = $idMarca;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setPrecioCompra($precioCompra){
        $this->precioCompra = $precioCompra;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta = $precioVenta;
    }

    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0, $idCategoria = NULL, $idMarca = NULL) {
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> precioCompra = $precioCompra;
        $this -> precioVenta = $precioVenta;
        $this -> idCategoria = $idCategoria; 
        $this -> idMarca = $idMarca; 
    }
    
    public function consultarTodos(){
        $productos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        $conexion -> ejecutarConsulta($productoDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $idCategoria = new Categoria($registro[5],$registro[6]);
            $idMarca = new Marca($registro[7],$registro[8]);
            $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $idCategoria, $idMarca);
            array_push($productos, $producto);
        }
        $conexion -> cerrarConexion();
        return $productos;        
    }
    
}

?>