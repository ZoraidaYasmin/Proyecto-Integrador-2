<?php
use PHPUnit\Framework\TestCase;
require_once 'src/personal.php';

class PersonalTest extends TestCase {

	/** @test **/
	public function test_probar_buscar_personal_llamado() {
		$buscar= new Personal();
		$condicion="1";
		$tabla="personal";
		$resultado=$buscar->buscar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

	public function test_probar_listar_personal_llamado() {
		$listar= new Personal();
		$tabla="personal";
		$resultado=$listar->listar($tabla);
		$this->assertEquals($tabla, $resultado,"listo");
	}

		/** @test **/
		public function test_probar_insertar_personal_llamado() {
			$insertar= new Personal();
			$valores="10,'99999999','PRUEBA DE INSERCION','PERSONAL@CSCOMAS.GOB.PE','PRINCIPAL',1,'DIRECCION','TELEFONO','CELULAR','SEXO','11-11-2022','11-11-2022'";
			$tabla="personal";
			$resultado=$insertar->insertar($tabla,$valores);
			$this->assertEquals($tabla, $resultado,"listo");
		}
	
	/** @test **/
		public function test_probar_actualizar_personal_llamado() {
			$actualizar= new Personal();
			$valores=" dni_personal='99999999',nom_personal='PRUEBA DE INSERCION',mail_personal='PERSONAL@CSCOMAS.GOB.PE',loc_personal='PRINCIPAL',est_personal=1, dir_personal='DIRECCION',tel_casa='TELEFONO',cel_personal='CELULAR',sex_personal='SEXO',fn_personal='11-11-2022',fi_personal='11-11-2022'";
			$condicion="10";
			$tabla="personal";
			$resultado=$actualizar->actualizar($tabla,$valores,$condicion);
			$this->assertEquals($tabla, $resultado,"listo");
		}

		
	/** @test **/
	public function test_probar_eliminar_personal_llamado() {
		$eliminar= new Personal();
		$condicion="10";
		$tabla="personal";
		$resultado=$eliminar->eliminar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

}
?>




}