<?php
	require_once 'database.php';
	/*  ---  */
		/*  start : Mi Perfil  */
			function editMyProfilWithPassword($id, $nombre, $apellido, $usuario, $correo, $clave, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'       => $id,
							':nombre'   => $nombre,
							':apellido' => $apellido,
							':usuario'  => $usuario,
							':correo'   => $correo,
							':clave'    => $clave,
							':editado'  => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_humanos rh
														SET rh.nombre = :nombre, rh.apellido = :apellido, rh.clave = :clave, rh.usuario = :usuario, rh.correo = :correo, rh.editado = :editado
															WHERE rh.id = :id");
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

			function editMyProfilWithoutPassword($id, $nombre, $apellido, $usuario, $correo, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'       => $id,
							':nombre'   => $nombre,
							':apellido' => $apellido,
							':usuario'  => $usuario,
							':correo'   => $correo,
							':editado'  => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_humanos rh
														SET rh.nombre = :nombre, rh.apellido = :apellido, rh.usuario = :usuario, rh.correo = :correo, rh.editado = :editado
															WHERE rh.id = :id");
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
		/*  end   : Mi Perfil  */

		function editCantidadRecursoMaterialAsignado($id, $cantidad){
			try {
				$pdo = database::connect();
				$flag = true;
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$params1 = array(
						':id'       => $id,
						':cantidad' => $cantidad
					);
				$sql = $pdo->prepare("UPDATE asignacion_de_recursos_materiales arm
												SET arm.cantidad = :cantidad
													WHERE arm.id = :id");
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
	/*  ---  */

	/*  start : Maestros  */
		/*  start : Actividades  */
			function editActividad($id, $nombre, $descripcion, $condicion_id, $escala_id, $entrega_id, $especialidad_id, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'              => $id,
							':nombre'          => $nombre,
							':descripcion'     => $descripcion,
							':condicion_id'    => $condicion_id,
							':escala_id'       => $escala_id,
							':entrega_id'      => $entrega_id,
							':especialidad_id' => $especialidad_id,
							':editado'         => $editado
						);
					$sql = $pdo->prepare("UPDATE actividades a
													SET a.id = :id, a.nombre = :nombre, a.descripcion = :descripcion, a.condicion_id = :condicion_id, a.escala_id = :escala_id, a.entrega_id = :entrega_id, a.especialidad_id = :especialidad_id, a.editado = :editado
														WHERE a.id = :id");
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

			function updateStatusActividad($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE actividades a
													SET a.estado = :estado, a.editado = :editado
														WHERE a.id = :id");
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
		/*  end   : Actividades  */

		/*  start : Clientes  */
			function editClienteWithPassword($id, $rif , $nombre, $direccion, $telefono, $usuario, $correo, $clave, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'             => $id,
							':rif'            => $rif,
							':nombre'         => $nombre,
							':direccion'      => $direccion,
							':telefono'       => $telefono,
							':usuario'        => $usuario,
							':correo'         => $correo,
							':clave'          => $clave,
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
							':editado'        => $editado
						);
					$sql = $pdo->prepare("UPDATE clientes c
													SET c.rif = :rif, c.nombre = :nombre, c.direccion = :direccion, c.telefono = :telefono, c.usuario = :usuario, c.correo = :correo, c.clave = :clave, 
														c.ing_e_nombre = :ing_e_nombre, c.ing_e_apellido = :ing_e_apellido, c.ing_e_cedula = :ing_e_cedula, c.ing_e_correo = :ing_e_correo, c.ing_e_telefono = :ing_e_telefono, 
														c.ing_s_nombre = :ing_s_nombre, c.ing_s_apellido = :ing_s_apellido, c.ing_s_cedula = :ing_s_cedula, c.ing_s_correo = :ing_s_correo, c.ing_s_telefono = :ing_s_telefono, 
														c.editado = :editado
														WHERE c.id = :id");
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

			function editClienteWithoutPassword($id, $rif , $nombre, $direccion, $telefono, $usuario, $correo, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'             => $id,
							':rif'            => $rif,
							':nombre'         => $nombre,
							':direccion'      => $direccion,
							':telefono'       => $telefono,
							':usuario'        => $usuario,
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
							':editado'        => $editado
						);
					$sql = $pdo->prepare("UPDATE clientes c
													SET c.rif = :rif, c.nombre = :nombre, c.direccion = :direccion, c.telefono = :telefono, c.usuario = :usuario, c.correo = :correo, 
														c.ing_e_nombre = :ing_e_nombre, c.ing_e_apellido = :ing_e_apellido, c.ing_e_cedula = :ing_e_cedula, c.ing_e_correo = :ing_e_correo, c.ing_e_telefono = :ing_e_telefono, 
														c.ing_s_nombre = :ing_s_nombre, c.ing_s_apellido = :ing_s_apellido, c.ing_s_cedula = :ing_s_cedula, c.ing_s_correo = :ing_s_correo, c.ing_s_telefono = :ing_s_telefono, 
														c.editado = :editado
														WHERE c.id = :id");
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

			function updateStatusCliente($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE clientes c
													SET c.estado = :estado, c.editado = :editado
														WHERE c.id = :id");
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
		/*  end   : Clientes  */

		/*  start: Feriados  */
			function editFeriado($id, $nombre, $fecha, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':nombre'  => $nombre,
							':fecha'   => $fecha,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE feriados f
													SET f.nombre = :nombre, f.fecha = :fecha, f.editado = :editado
														WHERE f.id = :id");
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

			function updateStatusFeriado($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE feriados f
													SET f.estado = :estado, f.editado = :editado
														WHERE f.id = :id");
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
		/*  end  : Feriados  */

		/*  start : Profesiones  */
			function editProfesion($id, $nombre, $descripcion, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'          => $id,
							':nombre'      => $nombre,
							':descripcion' => $descripcion,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("UPDATE profesiones p
													SET p.nombre = :nombre, p.descripcion = :descripcion, p.editado = :editado
														WHERE p.id = :id");
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
			function updateStatusProfesion($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE profesiones p
													SET p.estado = :estado, p.editado = :editado
														WHERE p.id = :id");
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
		/*  end   : Profesiones  */

		/*  start : Proyectos  */
			function editProyecto($id, $nombre, $descripcion, $costo, $cliente_id, $rh_id, $proyecto_estado_id, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'                 => $id,
							':nombre'             => $nombre,
							':descripcion'        => $descripcion,
							':costo'              => $costo,
							':cliente_id'         => $cliente_id,
							':rh_id'              => $rh_id,
							':proyecto_estado_id' => $proyecto_estado_id,
							':editado'            => $editado
						);
					$sql = $pdo->prepare("UPDATE proyectos p
													SET p.id = :id, p.nombre = :nombre, p.descripcion = :descripcion, p.costo = :costo, p.cliente_id = :cliente_id, p.rh_id = :rh_id, p.proyecto_estado_id = :proyecto_estado_id
														WHERE p.id = :id");
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

			function updateStatusProyecto($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE proyectos p
														SET p.estado = :estado, p.editado = :editado
															WHERE p.id = :id");
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
		/*  end   : Proyectos  */

		/*  start : Recursos Material  */
			function editRecursoMaterial($id, $nombre, $abreviatura, $cantidad, $costo, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'          => $id,
							':nombre'      => $nombre,
							':abreviatura' => $abreviatura,
							':cantidad'    => $cantidad,
							':costo'       => $costo,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_materiales rm
													SET rm.nombre = :nombre, rm.abreviatura = :abreviatura, rm.cantidad = :cantidad, rm.costo = :costo, rm.editado = :editado
														WHERE rm.id = :id");
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

			function updateStatusRecursoMaterial($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_materiales rm
													SET rm.estado = :estado, rm.editado = :editado
														WHERE rm.id = :id");
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
		/*  end   : Recursos Material  */

		/*  strat: Roles  */
			function editRol($id, $descripcion, $crear, $leer, $editar, $eliminar, $parametros, $registros, $seguimiento, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'          => $id,
							':descripcion' => $descripcion,
							':crear'       => $crear,
							':leer'        => $leer,
							':editar'      => $editar,
							':eliminar'    => $eliminar,
							':parametros'  => $parametros,
							':registros'   => $registros,
							':seguimiento' => $seguimiento,
							':editado'     => $editado
						);
					$sql = $pdo->prepare("UPDATE roles r
													SET r.descripcion = :descripcion, r.crear = :crear, r.leer = :leer, r.editar = :editar, r.eliminar = :eliminar, r.parametros = :parametros, r.registros = :registros, r.seguimiento = :seguimiento, r.editado = :editado
														WHERE r.id = :id");
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
		/*  end  : Roles  */

		/*  start : Recursos Humanos  */
			function editRecursoHumanoWithPassword($id, $nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $clave, $usuario, $rol_id, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'                    => $id,
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
							':editado'               => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_humanos rh
													SET rh.nombre = :nombre, rh.apellido = :apellido, rh.cedula = :cedula, rh.direccion = :direccion, rh.telefono = :telefono, rh.correo = :correo, rh.numero_de_colegiatura = :numero_de_colegiatura, rh.profesion_id = :profesion_id, rh.honorario = :honorario, rh.clave = :clave, rh.usuario = :usuario, rh.rol_id = :rol_id, rh.editado = :editado
														WHERE rh.id = :id");
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
			function editRecursoHumanoWithoutPassword($id, $nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $usuario, $rol_id, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'                    => $id,
							':nombre'                => $nombre,
							':apellido'              => $apellido,
							':cedula'                => $cedula,
							':direccion'             => $direccion,
							':telefono'              => $telefono,
							':correo'                => $correo,
							':numero_de_colegiatura' => $numero_de_colegiatura,
							':profesion_id'          => $profesion_id,
							':honorario'             => $honorario,
							':usuario'               => $usuario,
							':rol_id'                => $rol_id,
							':editado'               => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_humanos rh
													SET rh.nombre = :nombre, rh.apellido = :apellido, rh.cedula = :cedula, rh.direccion = :direccion, rh.telefono = :telefono, rh.correo = :correo, rh.numero_de_colegiatura = :numero_de_colegiatura, rh.profesion_id = :profesion_id, rh.honorario = :honorario, rh.usuario = :usuario, rh.rol_id = :rol_id, rh.editado = :editado
														WHERE rh.id = :id");
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
			function updateStatusRecursoHumano($id, $estado, $editado){
				try {
					$pdo = database::connect();
					$flag = true;
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$params1 = array(
							':id'      => $id,
							':estado'  => $estado,
							':editado' => $editado
						);
					$sql = $pdo->prepare("UPDATE recursos_humanos rh
													SET rh.estado = :estado, rh.editado = :editado
														WHERE rh.id = :id");
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
		/*  end   : Recursos Humanos  */
	/*  end   : Maestros  */