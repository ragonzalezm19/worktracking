<?php
	require_once 'database.php';

	/*  ---  */
		function inicioSesionRecursoHumano($usuario, $clave) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT rh.id, rh.nombre, rh.apellido, rh.usuario, rh.clave, rh.rol_id , 
						r.descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros, r.seguimiento
						FROM recursos_humanos AS rh
							INNER JOIN roles r ON r.id = rh.rol_id
							WHERE rh.usuario = '{$usuario}' 
							AND rh.clave = '{$clave}'";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function inicioSesionCliente($usuario, $clave) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT c.id, c.nombre, c.usuario, c.clave, c.rol_id , 
						r.descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros, r.seguimiento
						FROM clientes AS c
							INNER JOIN roles r ON r.id = c.rol_id
							WHERE c.usuario = '{$usuario}' 
							AND c.clave = '{$clave}'";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function usuarioRol($usuario){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT r.id, r.descripcion
						FROM recursos_humanos AS rh
							INNER JOIN roles r ON r.id = rh.rol_id
							WHERE rh.usuario = '{$usuario}'";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function Menu(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT m.id, m.nombre, m.icono, m.clase
						FROM menues AS m ";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function Submenu(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT sm.id, sm.nombre, sm.ruta, sm.clase, sm.subclase, sm.menu_id
						FROM submenues AS sm ";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function SubmenuParametros(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT sm.id, sm.nombre
						FROM submenues AS sm 
							WHERE sm.menu_id = 1";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function SubmenuRegistros(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT sm.id, sm.nombre
						FROM submenues AS sm 
							WHERE sm.menu_id = 2";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function allRoles(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT r.id, r.descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros, r.seguimiento, r.creado, r.editado
						FROM roles r";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function rol($id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT r.id, r.descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros, r.seguimiento, r.creado, r.editado
						FROM roles r
							WHERE r.id = {$id}";
			$data = $pdo->query($sql);
			$data = $data->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function ableProyectos(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT p.id, p.nombre, p.descripcion, p.gantt_id,
						pe.nombre AS pe_nombre, pe.clase
						FROM proyectos p
							INNER JOIN proyectos_estados pe ON pe.id = p.proyecto_estado_id
							WHERE p.estado = 1
								ORDER BY p.id ASC";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function ableProyectosReports(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT p.id, p.nombre, p.descripcion, p.costo, p.gantt_id, p.estado, p.creado, p.editado,
							c.nombre AS c_nombre
							FROM proyectos AS p 
								INNER JOIN clientes c ON c.id = p.cliente_id
									WHERE p.estado = 1
										ORDER BY p.id DESC";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function idGanttByName($text){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT g.id
						FROM gantt AS g
							WHERE g.text = '{$text}'";
			$data = $pdo->query($sql);
			$data = $data->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function ganntById($id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT g.id, g.text, g.start_date, g.duration, g.progress, g.sortorder, g.parent
						FROM gantt AS g
							WHERE g.id = {$id}";
			$data = $pdo->query($sql);
			$data = $data->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function actividadesByParent($parent){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT g.id, g.text, g.start_date, g.duration , g.progress
						FROM gantt g
							WHERE g.parent = {$parent}";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function recursosHumanosAsignadiosByTask($task_id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT arh.id,
						g.text,
						rh.nombre, rh.apellido,
						p.nombre AS p_nombre
						FROM asignacion_de_recursos_humanos arh
							INNER JOIN gantt g ON g.id = arh.task_id
							INNER JOIN recursos_humanos rh ON rh.id = arh.rh_id
							INNER JOIN profesiones p ON p.id = rh.profesion_id
								WHERE arh.task_id = {$task_id}";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function recursosMaterialesAsignadiosByTask($task_id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT arm.id, arm.cantidad,
						g.text,
						rm.nombre
						FROM asignacion_de_recursos_materiales arm
							INNER JOIN gantt g ON g.id = arm.task_id
							INNER JOIN recursos_materiales rm ON rm.id = arm.rm_id
								WHERE arm.task_id = {$task_id}";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function recursoMaterialAsignadoById($id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT arm.id, arm.cantidad, 
						rm.nombre, rm.cantidad AS rm_cantidad,
						g.text
						FROM asignacion_de_recursos_materiales arm
							INNER JOIN gantt g ON g.id = arm.task_id
							INNER JOIN recursos_materiales rm ON rm.id = arm.rm_id
								WHERE arm.id = {$id}";
			$data = $pdo->query($sql);
			$data = $data->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function recursoHumanoAsignadoById($id){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT arh.id,
						rh.nombre, rh.apellido,
						p.nombre AS p_nombre
						FROM asignacion_de_recursos_humanos arh
							INNER JOIN recursos_humanos rh ON rh.id = arh.rh_id
							INNER JOIN profesiones p ON p.id = rh.profesion_id
								WHERE arh.id = {$id}";
			$data = $pdo->query($sql);
			$data = $data->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function estadosDeProyectos(){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT p.id, p.nombre, p.clase
						FROM proyectos_estados p";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}
	/*  ---  */
	/*  start: Maestros  */
		/*  start: Parametros  */
			/*  start: Actividades  */
				/*function allActividades(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT a.id, a.nombre, a.descripcion, a.estado, a.creado, a.editado,
								c.id AS c_id, c.nombre AS c_nombre, c.descripcion AS c_descripcion, c.abreviatura AS c_abreviatura,
								esc.id AS esc_id, esc.nombre AS esc_nombre, esc.descripcion AS esc_descripcion, esc.desde AS esc_desde, esc.hasta AS esc_hasta, esc.abreviatura AS esc_abreviaturas,
								en.id AS en_id, en.nombre AS en_nombre, en.descripcion AS en_descripcion,
								esp.id AS esp_id, esp.nombre AS esp_nombre, esp.abreviatura AS esp_abreviatura,
								cl.id AS cl_id
								FROM actividades AS a 
									INNER JOIN condiciones c ON c.id = a.condicion_id
									INNER JOIN escalas esc ON esc.id = a.escala_id
									INNER JOIN entregables en ON en.id = a.entrega_id
									INNER JOIN especialidades esp ON esp.id = a.especialidad_id
									INNER JOIN clientes cl ON cl.id = a.cliente_id
								";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function actividad($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT a.id, a.nombre, a.descripcion, a.condicion_id, a.escala_id, a.entrega_id, a.especialidad_id, a.estado
								FROM actividades a
									WHERE a.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}*/
			/*  end  : Actividades  */

			/*  start: Clientes  */
				function allClientes(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT c.id, c.nombre, c.direccion, c.rif, c.telefono, c.ing_e_nombre, c.ing_e_apellido, c.ing_e_cedula, c.ing_e_correo, c.ing_e_telefono, c.ing_s_nombre, c.ing_s_apellido, c.ing_s_cedula, c.ing_s_correo, c.ing_s_telefono,c.estado, c.creado, c.editado
								FROM clientes AS c ";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function cliente($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT c.id, c.nombre, c.direccion, c.rif, c.telefono, c.usuario, c.correo, c.ing_e_nombre, c.ing_e_apellido, c.ing_e_cedula, c.ing_e_correo, c.ing_e_telefono, c.ing_s_nombre, c.ing_s_apellido, c.ing_s_cedula, c.ing_s_correo, c.ing_s_telefono,c.estado, c.creado, c.editado
								FROM clientes AS c 
									WHERE c.id = {$id} ";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				/*function clienteByUsuario($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT c.id, c.nombre, c.direccion, c.rif, c.telefono, c.usuario, c.correo, c.ing_e_nombre, c.ing_e_apellido, c.ing_e_cedula, c.ing_e_correo, c.ing_e_telefono, c.ing_s_nombre, c.ing_s_apellido, c.ing_s_cedula, c.ing_s_correo, c.ing_s_telefono,c.estado, c.creado, c.editado
								FROM clientes AS c 
									WHERE c.id = {$id} ";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}*/
			/*  end  : Clientes  */

			/*  start: Feriados  */
				function allFeriados(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT f.id, f.nombre, f.fecha, f.estado, f.creado, f.editado
								FROM feriados AS f";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function feriado($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT f.id, f.nombre, f.fecha, f.estado, f.creado, f.editado
								FROM feriados AS f
									WHERE f.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function feriadosFechas(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT f.fecha
								FROM feriados AS f";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Feriados  */

			/*  start: Permisos  */
				function allPermisos(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.crear, p.leer, p.editar, p.eliminar, p.parametros, p.registros, p.creado, p.editado
								FROM permisos AS p ";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function permiso($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.crear, p.leer, p.editar, p.eliminar, p.parametros, p.registros, p.creado, p.editado
								FROM permisos AS p 
									WHERE p.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Permisos  */

			/*  start: Profesiones  */
				function allProfesiones(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.estado, p.creado, p.editado
								FROM profesiones AS p ";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function profesion($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.estado, p.creado, p.editado
								FROM profesiones AS p 
									WHERE p.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Profesiones  */

			/*  start: Proyectos  */
				function allProyectos(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.costo, p.gantt_id, p.estado, p.creado, p.editado,
								c.nombre AS c_nombre
								FROM proyectos AS p 
									INNER JOIN clientes c ON c.id = p.cliente_id";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function proyecto($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.costo, p.fecha, p.cliente_id, p.rh_id, p.proyecto_estado_id, p.estado, p.creado, p.editado,
								c.rif, c.nombre AS c_nombre, c.direccion,
								rh.nombre AS rh_nombre, rh.apellido,
								pe.nombre AS pe_nombre
								FROM proyectos p 
									INNER JOIN clientes c ON c.id = p.cliente_id
									INNER JOIN recursos_humanos rh ON rh.id = p.rh_id
									INNER JOIN proyectos_estados pe ON pe.id = p.proyecto_estado_id
										WHERE p.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function proyectoAndGanttById($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.costo,
								rh.nombre AS rh_nombre, rh.apellido,
								pro.nombre AS pro_nombre,
								g.id AS g_id, g.text, g.duration, g.parent
								FROM proyectos p
									INNER JOIN recursos_humanos rh ON rh.id = p.rh_id
									INNER JOIN profesiones pro ON pro.id = rh.profesion_id
									INNER JOIN gantt g ON g.id = p.gantt_id
										WHERE p.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function ganttIdByProjectId($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT pro.gantt_id
								FROM proyectos pro
									WHERE pro.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function actividadesAndGanttBy($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT g.id, g.text, g.duration, g.parent,
								rh.nombre, rh.apellido,
								p.nombre AS p_nombre
								FROM gantt g
									INNER JOIN asignacion_de_recursos_humanos arh ON arh.task_id = g.id
									INNER JOIN recursos_humanos rh ON rh.id = arh.rh_id
									INNER JOIN profesiones p ON p.id = rh.profesion_id
										WHERE g.parent = {$id} 
											ORDER BY g.id ASC";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function infoParaCostoPorActividadRecursoHumano($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT g.text, g.duration,
								rh.nombre, rh.apellido, rh.honorario,
								p.nombre AS p_nombre
								FROM asignacion_de_recursos_humanos arh
									INNER JOIN gantt g ON g.id = arh.task_id
									INNER JOIN recursos_humanos rh ON rh.id = arh.rh_id
									INNER JOIN profesiones p ON p.id = rh.profesion_id
										WHERE arh.task_id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function infoParaCostoPorActividadRecursoMaterial($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT arm.cantidad,
								g.text, g.duration,
								rm.nombre, rm.costo, rm.abreviatura
								FROM asignacion_de_recursos_materiales arm
									INNER JOIN gantt g ON g.id = arm.task_id
									INNER JOIN recursos_materiales rm ON rm.id = arm.rm_id
										WHERE arm.task_id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Proyectos  */

			/*  start: Recursos Materiales  */
				function allRecursosMateriales(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rm.id, rm.nombre, rm.abreviatura, rm.cantidad, rm.costo, rm.estado, rm.creado, rm.editado
								FROM recursos_materiales rm";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function recursoMaterial($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rm.id, rm.nombre, rm.abreviatura, rm.cantidad, rm.costo, rm.estado, rm.creado, rm.editado
								FROM recursos_materiales rm
									WHERE rm.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}

				function recursosMaerialesAble(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rm.id, rm.nombre, rm.abreviatura, rm.cantidad, rm.costo, rm.estado, rm.creado, rm.editado
								FROM recursos_materiales rm
									WHERE rm.estado = 1";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Recursos Materiales  */

			/*  start: Recursos Humanos  */
				function allRecursosHumanos(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rh.id, rh.nombre, rh.apellido, rh.cedula, rh.direccion, rh.telefono, rh.honorario, rh.usuario, rh.correo, rh.estado, rh.rol_id, rh.profesion_id, rh.creado, rh.editado,
								r.descripcion AS r_descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros,
								p.nombre AS p_nombre, p.descripcion AS p_descripcion
								FROM recursos_humanos AS rh
									INNER JOIN roles r ON r.id = rh.rol_id 
									INNER JOIN profesiones p ON p.id = rh.profesion_id";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function recursoHumano($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rh.id, rh.nombre, rh.apellido, rh.cedula, rh.direccion, rh.telefono, rh.honorario, rh.usuario, rh.correo, rh.numero_de_colegiatura, rh.estado, rh.rol_id, rh.profesion_id, rh.creado, rh.editado,
								r.descripcion AS r_descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros,
								p.nombre AS p_nombre, p.descripcion AS p_descripcion
								FROM recursos_humanos AS rh
									INNER JOIN roles r ON r.id = rh.rol_id 
									INNER JOIN profesiones p ON p.id = rh.profesion_id 
										WHERE rh.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function recursosHumanosAble(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rh.id, rh.nombre, rh.apellido, rh.cedula, rh.direccion, rh.telefono, rh.honorario, rh.usuario, rh.correo, rh.estado, rh.rol_id, rh.profesion_id, rh.creado, rh.editado,
								r.descripcion AS r_descripcion, r.crear, r.leer, r.editar, r.eliminar, r.parametros, r.registros,
								p.nombre AS p_nombre, p.descripcion AS p_descripcion
								FROM recursos_humanos AS rh
									INNER JOIN roles r ON r.id = rh.rol_id 
									INNER JOIN profesiones p ON p.id = rh.profesion_id 
										WHERE rh.estado = 1";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
				function usuarioWithoutRol($id){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT rh.id, rh.nombre, rh.apellido, rh.usuario, rh.rol_id,
								r.descripcion
								FROM recursos_humanos AS rh
									INNER JOIN roles r ON r.id = rh.rol_id 
										WHERE rh.id = {$id}";
					$data = $pdo->query($sql);
					$data = $data->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Recursos Humanos  */
		/*  end  : Parametros  */

		/*  start: Registros  */
			/*  start: Costos  */
				function allCostos(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT c.id, c.costo_real, c.fecha, c.creado, c.editado,
								a.id AS a_id, a.nombre AS a_nombre, a.descripcion AS a_descripcion,
								p.id AS p_id, p.nombre AS p_descripcion, p.costo AS p_costo
								FROM costos AS c 
									INNER JOIN actividades a ON a.id = c.actividad_id
									INNER JOIN proyectos p ON p.id = c.proyecto_id";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Costos  */

			/*  start: Informacion de Proyecto  */
				function allInformacionDeProyecto(){
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT p.id, p.nombre, p.descripcion, p.costo, p.creado, p.editado,
								c.id AS c_id, c.nombre AS c_nombre, c.apellido AS c_apellido, c.rif AS c_rif, c.ing_1_nombre AS c_ing_1_nombre, c.ing_1_telefono AS c_ing_1_telefono, c.ing_1_correo AS c_ing_1_correo, c.ing_2_nombre AS c_ing_2_nombre, c.ing_2_telefono AS c_ing_2_telefono, c.ing_2_correo AS c_ing_2_correo
								FROM proyectos AS p 
									INNER JOIN clientes c ON c.id = p.cliente_id";
					$data = $pdo->query($sql);
					$data = $data->fetchAll(PDO::FETCH_ASSOC);
					Database::disconnect();
					return $data;
				}
			/*  end  : Informacion de Proyecto  */
		/*  end  : Registros  */
	/*  end  : Maestros  */