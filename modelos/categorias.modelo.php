<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){
		$link = Conexion::conectar();
		$stmt = $link->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
		echo "pasooo!!";
		$link = null;
		$stmt = null;
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		$link = Conexion::conectar();
		
		if($item != null){
			
			$stmt = $link->prepare("SELECT * FROM $tabla WHERE $item = :valor");

			//$stmt -> bindParam(":item", $item, PDO::PARAM_STR);
			$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);

			$stmt -> execute();
			return $stmt -> fetch();

		}else{
			
			$stmt = $link->prepare("SELECT * FROM $tabla");

			$stmt -> execute();
			return $stmt -> fetchAll();
		}


		echo "pasooo!!";
		$link = null;
		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){
		
		$link = Conexion::conectar();
		$stmt = $link->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
		echo "pasooo!!";
		$link = null;
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){
		
		$link = Conexion::conectar();
		$stmt = $link->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}
		echo "pasooo!!";
		$link = null;
		$stmt = null;

	}

}

