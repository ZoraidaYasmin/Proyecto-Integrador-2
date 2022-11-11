<?php
//require_once ('src/index.php');
use PHPUnit\Framework\TestCase;
require_once 'src/paciente.php';

class PacienteTest extends TestCase {

	/** @test **/
	public function test_probar_buscar_paciente_llamado() {
		$buscar= new Paciente();
		$condicion="10101010";
		$tabla="paciente";
		$resultado=$buscar->buscar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

	public function test_probar_listar_paciente_llamado() {
		$listar= new Paciente();
		$tabla="paciente";
		$resultado=$listar->listar("paciente");
		$this->assertEquals($tabla, $resultado,"listo");
	}

		/** @test **/
		public function test_probar_insertar_paciente_llamado() {
			$insertar= new Paciente();
			$valores="'99999999','PRUEBA DE INSERCION','PRUEBA DE INSERCION','TEST@CSCOMAS.GOB.PE',1,'DIRECCION','TELEFONO','CELULAR','SEXO','11-11-2022'";
			$tabla="paciente";
			$resultado=$insertar->insertar($tabla,$valores);
			$this->assertEquals($tabla, $resultado,"listo");
		}
	
	/** @test **/
		public function test_probar_actualizar_paciente_llamado() {
			$actualizar= new Paciente();
			$valores=" nom_paciente='PRUEBA DE INSERCION',ape_personal='PRUEBA DE INSERCION',mail_paciente='TEST@CSCOMAS.GOB.PE',est_paciente=1, dir_paciente='DIRECCION',tel_paciente='TELEFONO',cel_paciente='CELULAR',sex_paciente='SEXO',fn_paciente='11-11-2022'";
			$condicion="99999999";
			$tabla="paciente";
			$resultado=$actualizar->actualizar($tabla,$valores,$condicion);
			$this->assertEquals($tabla, $resultado,"listo");
		}

		
	/** @test **/
	public function test_probar_eliminar_paciente_llamado() {
		$eliminar= new Paciente();
		$condicion="99999999";
		$tabla="paciente";
		$resultado=$eliminar->eliminar($tabla,$condicion);
		$this->assertEquals($tabla, $resultado,"listo");
	}

}
?>




}