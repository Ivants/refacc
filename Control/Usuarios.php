<?php
/**
 * Representa el la estructura de las usuarioss
 * almacenadas en la base de datos
 */
require 'data_base.php';
class usuarios
{
	function __construct()
	{
	}
	/**
	 * Retorna en la fila especificada de la tabla 'usuarios'
	 *
	 * @param $user Identificador del registro
	 * @return array Datos del registro
	 */
	public static function getAll(){
		$consulta = "SELECT * FROM usuarios";
		try {
			// Preparar sentencia
			$comando = Database::getInstance()->getDb()->prepare($consulta);
			// Ejecutar sentencia preparada
			$comando->execute();
			return $comando->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return false;
		}
	}
	/**
	 * Retorna en la fila especificada de la tabla 'usuarios'
	 *
	 * @param $user Identificador del registro
	 * @return array Datos del registro
	 */
	public static function getProjects(){
		$consulta = "SELECT * FROM proyectos";
		try {
			// Preparar sentencia
			$comando = Database::getInstance()->getDb()->prepare($consulta);
			// Ejecutar sentencia preparada
			$comando->execute();
			return $comando->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return false;
		}
	}
	/**
	* Obtiene los campos de un Alumno con un identificador (user)
	* determinado
	*
	* @param $user Identificador del alumno
	* @return mixed
	*/
	public static function getByUser($user){
		// Consulta de la tabla usuarios
		$consulta = "SELECT user,
							pass,
							email
							 FROM usuarios
							 WHERE user = ?";
		try {
			// Preparar sentencia
			$comando = Database::getInstance()->getDb()->prepare($consulta);
			// Ejecutar sentencia preparada
			$comando->execute(array($user));
			// Capturar primera fila del resultado
			$row = $comando->fetch(PDO::FETCH_ASSOC);
			return $row;
		} catch (PDOException $e) {
			// Aquí puedes clasificar el error dependiendo de la excepción
			// para presentarlo en la respuesta Json
			return -1;
		}
	}
		/**
	* Obtiene los campos de un Proyecto con un identificador (id)
	* determinado
	*
	* @param $id Identificador del proyecto
	* @return mixed
	*/
	public static function getProjectById($id){
		// Consulta de la tabla usuarios
		$consulta = "SELECT user,
							pass,
							email
							 FROM usuarios
							 WHERE user = ?";
		try {
			// Preparar sentencia
			$comando = Database::getInstance()->getDb()->prepare($consulta);
			// Ejecutar sentencia preparada
			$comando->execute(array($user));
			// Capturar primera fila del resultado
			$row = $comando->fetch(PDO::FETCH_ASSOC);
			return $row;
		} catch (PDOException $e) {
			// Aquí puedes clasificar el error dependiendo de la excepción
			// para presentarlo en la respuesta Json
			return -1;
		}
	}
	/**
	 * Actualiza un registro de la bases de datos basado
	 * en los nuevos valores relacionados con un identificador
	 *
	 * @param $user      identificador
	 * @param $pass      nuevo pass
	 * @param $email nueva email
	 
	 */
	public static function update($user,$pass,$email){
		// Creando consulta UPDATE
		$consulta = "UPDATE usuarios" .
			" SET pass=?, email=? " .
			"WHERE user=?";
		// Preparar la sentencia
		$cmd = Database::getInstance()->getDb()->prepare($consulta);
		// Relacionar y ejecutar la sentencia
		$cmd->execute(array($pass, $email, $user));
		return $cmd;
	}
	/**
	 * Insertar un nuevo usuario
	 *
	 * @param $pass      pass del nuevo registro
	 * @param $email dirección del nuevo registro
	 * @return PDOStatement
	 */
	public static function insert($user,$pass,$email){
		// Sentencia INSERT
		$comando = "INSERT INTO usuarios ( " .
			"user,".
			"pass," .
			"email)" .
			"VALUES (?,?,?)";
		// Preparar la sentencia
		$sentencia = Database::getInstance()->getDb()->prepare($comando);
		return $sentencia->execute(
			array(
				$user,
				$pass,
				$email
			)
		);
	}
		/**
	 * Insertar un nuevo proyecto
	 *
	 * @param $nombre del nuevo proyecto
	 * @param $email dirección del nuevo registro
	 * @return PDOStatement
	 */
	public static function insertProject($user,$nombreP,$contacto,$descripcion,$imagen){
		// Sentencia INSERTj
		$comando = "INSERT INTO proyectos 
									VALUES(NULL,
											'".$user."',
											'".$nombreP."',
											'".$contacto."',
											'".$descripcion."',
											'".$imagen."')";
		// Preparar la sentencia
		$sentencia = Database::getInstance()->getDb()->prepare($comando);
		return $sentencia->execute(
			array(
				$user,
				$nombreP,
				$contacto,
				$descripcion,
				$imagen
			)
		);
	}
	/**
	 * Eliminar el registro con el identificador especificado
	 *
	 * @param $user identificador de la tabla usuarios
	 * @return bool Respuesta de la eliminación
	 */
	public static function delete($user){
		// Sentencia DELETE
		$comando = "DELETE FROM usuarios WHERE user=?";
		// Preparar la sentencia
		$sentencia = Database::getInstance()->getDb()->prepare($comando);
		return $sentencia->execute(array($user));
	}
}
?>