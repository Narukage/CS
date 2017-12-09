<?php 

error_reporting(0);

class Utilidades{

	const NOMBREDB = 'pibd';
	const USUARIODB = 'Pepe';
	const PASSDB = 'pepe';
	const DIRDB = 'localhost';

	public static function obtenerPaises(){
		$conn = mysqli_connect(self::DIRDB, self::USUARIODB, self::PASSDB, self::NOMBREDB);
		if(!$conn){
    		return false;
    	}

    	$sql = 'SELECT * FROM paises';
    	$paises = mysqli_query($conn, $sql);
    	$arraypaises = array("-" => "-");

		if (mysqli_num_rows($paises) > 0) {
    		while($pais = mysqli_fetch_assoc($paises)) {
    			$arraypaises[ $pais["IdPais"] ] = $pais["NomPais"];
    		}
		} else {
    		echo "0 results";
		}
		mysqli_close($conn);
    	return $arraypaises;
	}

	public static function ejecutaInsert($sql){
		$conn = mysqli_connect(self::DIRDB, self::USUARIODB, self::PASSDB, self::NOMBREDB);
		if(!$conn){
    		return false;
    	}

    	if(!mysqli_query($conn, $sql)){
    		mysqli_close($conn);
			return false;
    	}

    	mysqli_close($conn);
    	return true;
	}

	public static function ejecutaUpdate($sql){
		$conn = mysqli_connect(self::DIRDB, self::USUARIODB, self::PASSDB, self::NOMBREDB);

		if(!$conn){
    		return false;
    	}

    	if(!mysqli_query($conn, $sql)){
    		mysqli_close($conn);
			return false;
    	}

    	mysqli_close($conn);
    	return true;
	}
	public static function datosUsuario($sql){
		$conn = mysqli_connect(self::DIRDB, self::USUARIODB, self::PASSDB, self::NOMBREDB);
		if(!$conn){
    		return false;
    	}

    	$datos = "";
    	$resultado = mysqli_query($conn, $sql);
		if (mysqli_num_rows($resultado) > 0) {
    		$datos = mysqli_fetch_assoc($resultado);
    		
		} else {
    		$datos = "0 results";
		}

    	mysqli_close($conn);
		return $datos;
	}
}

?>