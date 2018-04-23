<?php

include 'db.php';
abstract class main{

	protected $table='users';



	abstract public function insertData();
	abstract public function update($id);

	// Query by id
	public function readByid($id){
		$sql = "SELECT * FROM $this->table WHERE id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	//Data delete
	public function dataDelete($id){

		$sql  = "DELETE FROM $this->table where id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute(); 
	}


// Method for read data
	public function readall(){

	

		$sql = "SELECT * FROM $this->table";

		 $stmt = DB::prepare($sql);

		// $success = $stmt->execute();

		 if($stmt->execute()){
    			echo 'readall method Query Executed';
			}
			else {
				 echo 'Sorry, Something wrong';
			}

		 return $stmt->fetchAll();
	}

}


 ?>