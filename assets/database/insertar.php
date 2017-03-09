<?php
	require_once 'database.php';

	function proyectoGantt($text, $start_date, $duration, $progress, $sortorder, $parent){
		try {
			$pdo = database::connect();
			$flag = true;
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$params1 = array(
					':text'       => $text,
					':start_date' => $start_date,
					':duration'   => $duration,
					':progress'   => $progress,
					':sortorder'  => $sortorder,
					':parent'     => $parent
				);
			$sql = $pdo->prepare("INSERT INTO gantt
													(text, start_date, duration, progress, sortorder, parent)
														VALUES
																(:text, :start_date, :duration, :progress, :sortorder, :parent)");
			try {
				$pdo->beginTransaction();
				$sql->execute($params1);
				$pdo->commit();
			} catch(PDOExecption $e) {
				$pdo->rollback();
				$flag = false;
			}
		} catch( PDOExecption $e ) {
			$flag = false;
		}
		database::disconnect();
		return $flag;
	}

	function addAsignacionRecursoHumano($actividad, $recurso){
		try {
			$pdo = database::connect();
			$flag = true;
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$params1 = array(
					':task_id'     => $actividad,
					':rh_id'       => $recurso
				);
			$sql = $pdo->prepare("INSERT INTO asignacion_de_recursos_humanos 
											(task_id, rh_id)
												VALUES
													(:task_id, :rh_id)");
			try {
				$pdo->beginTransaction();
				$sql->execute($params1);
				$pdo->commit();
			} catch(PDOExecption $e) {
				$pdo->rollback();
				$flag = false;
			}
		} catch( PDOExecption $e ) {
			$flag = false;
		}
		database::disconnect();
		return $flag;
	}

	function addAsignacionRecursoMaterial($actividad, $recurso, $cantidad){
		try {
			$pdo = database::connect();
			$flag = true;
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$params1 = array(
					':task_id' => $actividad,
					':rm_id'        => $recurso,
					':cantidad'     => $cantidad
				);
			$sql = $pdo->prepare("INSERT INTO asignacion_de_recursos_materiales
											(task_id, rm_id, cantidad)
												VALUES
													(:task_id, :rm_id, :cantidad)");
			try {
				$pdo->beginTransaction();
				$sql->execute($params1);
				$pdo->commit();
			} catch(PDOExecption $e) {
				$pdo->rollback();
				$flag = false;
			}
		} catch( PDOExecption $e ) {
			$flag = false;
		}
		database::disconnect();
		return $flag;
	}

	/*  start: Maestros  */
		/*  start: Parametros  */
			function addActividad($nombre, $descripcion, $condicion_id ,$escala_id, $entrega_id, $especialidad_id, $estado, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'          => $nombre,
							':descripcion'     => $descripcion,
							':condicion_id'    => $condicion_id,
							':escala_id'       => $escala_id,
							':entrega_id'      => $entrega_id,
							':especialidad_id' => $especialidad_id,
							':estado'          => $estado,
							':creado'          => $creado,
							':editado'         => $editado
						);
					$sql = $pdo->prepare("INSERT INTO actividades
													(nombre, descripcion, condicion_id, escala_id, entrega_id, especialidad_id, estado, creado, editado)
														VALUES
																(:nombre, :descripcion, :condicion_id, :escala_id, :entrega_id, :especialidad_id, :estado, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addCliente($rif , $nombre, $direccion, $telefono, $usuario, $correo, $clave, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':rif'            => $rif,
							':nombre'         => $nombre,
							':direccion'      => $direccion,
							':telefono'       => $telefono,
							':usuario'        => $usuario,
							':clave'          => $clave,
							':correo'         => $correo,
							':ing_e_nombre'   => $ing_e_nombre,
							':ing_e_apellido' => $ing_e_apellido,
							':ing_e_cedula'   => $ing_e_cedula,
							':ing_e_correo'   => $ing_e_correo,
							':ing_e_telefono' => $ing_e_telefono,
							':ing_s_nombre'   => $ing_s_nombre,
							':ing_s_apellido' => $ing_s_apellido,
							':ing_s_cedula'   => $ing_s_cedula,
							':ing_s_correo'   => $ing_s_correo,
							':ing_s_telefono' => $ing_s_telefono,
							':creado'         => $creado,
							':editado'        => $editado
						);
					$sql = $pdo->prepare("INSERT INTO clientes
													(rif , nombre, direccion, telefono, usuario, correo, clave, ing_e_nombre, ing_e_apellido, ing_e_cedula, ing_e_correo, ing_e_telefono,  ing_s_nombre, ing_s_apellido, ing_s_cedula, ing_s_correo, ing_s_telefono, creado, editado)
														VALUES
																(:rif , :nombre, :direccion, :telefono, :usuario, :correo, :clave, :ing_e_nombre, :ing_e_apellido, :ing_e_cedula, :ing_e_correo, :ing_e_telefono,  :ing_s_nombre, :ing_s_apellido, :ing_s_cedula, :ing_s_correo, :ing_s_telefono, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addFeriado($nombre, $fecha, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'  => $nombre,
							':fecha'   => $fecha,
							':creado'  => $creado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("INSERT INTO feriados
													(nombre, fecha, creado, editado)
														VALUES
															(:nombre, :fecha, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addProfesion($nombre, $descripcion, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'      => $nombre,
							':descripcion' => $descripcion,
							':creado'      => $creado,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("INSERT INTO profesiones
													(nombre, descripcion, creado, editado)
														VALUES
															(:nombre, :descripcion, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addProyecto($nombre, $descripcion, $costo, $cliente_id, $rh_id, $gantt_id, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'             => $nombre,
							':descripcion'        => $descripcion,
							':costo'              => $costo,
							':cliente_id'         => $cliente_id,
							':rh_id'              => $rh_id,
							':proyecto_estado_id' => 1,
							':gantt_id'           => $gantt_id,
							':creado'             => $creado,
							':editado'            => $editado
						);
					$sql = $pdo->prepare("INSERT INTO proyectos
													(nombre, descripcion, costo, cliente_id, rh_id, proyecto_estado_id, gantt_id, creado, editado)
														VALUES
																(:nombre, :descripcion, :costo, :cliente_id, :rh_id, :proyecto_estado_id, :gantt_id, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addRecursoMaterial($nombre, $abreviatura, $cantidad, $costo, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'      => $nombre,
							':abreviatura' => $abreviatura,
							':cantidad'    => $cantidad,
							':costo'       => $costo,
							':creado'      => $creado,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("INSERT INTO recursos_materiales
													(nombre, abreviatura, cantidad, costo, creado, editado)
														VALUES
																(:nombre, :abreviatura, :cantidad, :costo, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addRol($descripcion, $crear, $leer, $editar, $eliminar, $parametros, $registros, $seguimiento, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':descripcion' => $descripcion,
							':crear'       => $crear,
							':leer'        => $leer,
							':editar'      => $editar,
							':eliminar'    => $eliminar,
							':parametros'  => $parametros,
							':registros'   => $registros,
							':seguimiento' => $seguimiento,
							':creado'      => $creado,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("INSERT INTO roles
													(descripcion, crear, leer, editar, eliminar, parametros, registros, seguimiento, creado, editado)
														VALUES
															(:descripcion, :crear, :leer, :editar, :eliminar, :parametros, :registros, :seguimiento, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			function addRecursoHumano($nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $clave, $usuario, $rol_id, $creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':nombre'                => $nombre,
							':apellido'              => $apellido,
							':cedula'                => $cedula,
							':direccion'             => $direccion,
							':telefono'              => $telefono,
							':correo'                => $correo,
							':numero_de_colegiatura' => $numero_de_colegiatura,
							':profesion_id'          => $profesion_id,
							':honorario'             => $honorario,
							':clave'                 => $clave,
							':usuario'               => $usuario,
							':rol_id'                => $rol_id,
							':creado'                => $creado,
							':editado'               => $editado
						);
					$sql = $pdo->prepare("INSERT INTO recursos_humanos
													(nombre, apellido, cedula, direccion, telefono, correo, numero_de_colegiatura, profesion_id, honorario, clave, usuario, rol_id, creado, editado)
														VALUES
															(:nombre, :apellido, :cedula, :direccion, :telefono, :correo, :numero_de_colegiatura, :profesion_id, :honorario, :clave, :usuario, :rol_id, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}
		/*  end  : Parametros  */

		/*  start: Registros  */
			function addCosto($costo_real, $fecha, $actividad_id, $proyecto_id ,$creado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':costo_real'   => $costo_real,
							':fecha'        => $fecha,
							':actividad_id' => $actividad_id,
							':proyecto_id'  => $proyecto_id,
							':creado'       => $creado,
							':editado'      => $editado
						);
					$sql = $pdo->prepare("INSERT INTO costos
													(costo_real, fecha, actividad_id, proyecto_id, creado, editado)
														VALUES
																(:costo_real, :fecha, :actividad_id, :proyecto_id, :creado, :editado)");
					try {
						$pdo->beginTransaction();
						$sql->execute($params1);
						$pdo->commit();
					} catch(PDOExecption $e) {
						$pdo->rollback();
						$flag = false;
					}
				} catch( PDOExecption $e ) {
					$flag = false;
				}
				database::disconnect();
				return $flag;
			}

			
		/*  end  : Registros  */
	/*  end  : Maestros  */
