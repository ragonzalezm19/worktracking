<?php 

	require_once 'database.php';

	function deleteARM($id){
		try {
			$pdo = database::connect();
			$flag = true;
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$params1 = array(
					':id' => $id
				);
			$sql = $pdo->prepare("DELETE FROM asignacion_de_recursos_materiales 
											WHERE id = {$id}");
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

	function deleteARH($id){
		try {
			$pdo = database::connect();
			$flag = true;
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$params1 = array(
					':id' => $id
				);
			$sql = $pdo->prepare("DELETE FROM asignacion_de_recursos_humanos 
											WHERE id = {$id}");
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