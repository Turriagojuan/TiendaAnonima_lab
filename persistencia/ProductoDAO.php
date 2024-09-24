<?php
class ProductoDAO{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $idMarca;
    private $idCategoria;
    
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
        return "SELECT p.idProducto, p.nombre, p.cantidad, p.precioCompra, p.precioVenta, 
                       c.idCategoria, c.nombre,m.idMarca, m.nombre
                FROM Producto p
                JOIN Categoria c ON p.Categoria_idCategoria = c.idCategoria
                JOIN Marca m ON p.Marca_idMarca = m.idMarca";
    }
    
    
}

?>