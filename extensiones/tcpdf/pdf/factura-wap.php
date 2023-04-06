<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../modelos/variables.php";

//

$mail = EMPRESAMAIL;

$codigo = $_GET["codigo"];

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $codigo;
$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//telefono del cliente
if is_array($respuestaCliente["telefono"]){
	$telefono = $respuestaCliente["telefono"]
}else{
	$telefono = "desconocido"
};

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//  $respuestaCliente[nombre]
//  $fecha
//  $respuestaVendedor[nombre]</td>
// Producto</td>
// Cantidad</td>
// Valor Unit.</td>
// Valor Total</td>
$grillaProductos = "";

foreach ($productos as $key => $item) {

	//preparo los parametros para la funcion mostrar productos
	$itemProducto = "descripcion";
	$valorProducto = $item["descripcion"];
	$orden = null;
	$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

	$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

	$precioTotal = number_format($item["total"], 2);

	$grillaProductos .=	$item["descripcion"];
	$grillaProductos .=	" - *".$item["cantidad"]."* *Kg.* ";
	//$grillaProductos .=	" - valor$".$valorUnitario;
	$grillaProductos .=	" - $".$precioTotal;
	$grillaProductos .="-.-";
}
 				// Neto:	$ $neto
 				// Impuesto: $ $impuesto
 				// Total: $ $total
				// telefono mio +5493516694444
header("Location: https://wa.me/".$telefono."?text=el día ".$fecha.", el vendedor: ".$respuestaVendedor["nombre"]." entrego ".$grillaProductos." que suman un total de ".$total );
//$pdf = "<a href='whatsapp://send?phone=+5493516694444'>Enviar mensaje por WhatsApp</a>";
exit();
