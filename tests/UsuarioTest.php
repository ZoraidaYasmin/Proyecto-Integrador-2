<?php
//require_once ('src/index.php');
use PHPUnit\Framework\TestCase;
require_once 'src/usuario.php';

class UsuarioTest extends TestCase {

	/** @test **/
	public function test_probar_buscar_usuario_llamado() {
		$buscar= new Usuario();
		$condicion=(int)"1";
		$tabla="usuario";
		$resultado=$buscar->buscar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

	public function test_probar_listar_usuario_llamado() {
		$listar= new Usuario();
		$tabla="usuario";
		$resultado=$listar->listar("usuario");
		$this->assertEquals($tabla, $resultado,"listo");
	}

		/** @test **/
		public function test_probar_insertar_usuario_llamado() {
			$insertar= new Usuario();
			$valores="4,3,1,'TEST@CSCOMAS.GOB.PE','','PRUEBA',1";
			$tabla="usuario";
			$resultado=$insertar->insertar($tabla,$valores);
			$this->assertEquals($tabla, $resultado,"listo");
		}
	
	/** @test **/
		public function test_probar_actualizar_usuario_llamado() {
			$actualizar= new Usuario();
			$valores="id_personal=3,id_rol=1,mail_usuario='TEST@CSCOMAS.GOB.PE',pas_personal='',des_usuario='PRUEBA',est_usuario=1";
			$condicion="4";
			$tabla="usuario";
			$resultado=$actualizar->actualizar($tabla,$valores,$condicion);
			$this->assertEquals($tabla, $resultado,"listo");
		}

		
	/** @test **/
	public function test_probar_eliminar_paciente_llamado() {
		$eliminar= new Usuario();
		$condicion="4";
		$tabla="usuario";
		$resultado=$eliminar->eliminar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

}
?>




}