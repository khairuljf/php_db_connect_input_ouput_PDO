<?php

include 'db.php';

class userinfo{
	private $table='users';
	private $name;
	private $email;
	private $skill;

	public function setName($name){
			$this->name = $name;
	}
	public function setMail($mail){
			$this->email = $mail;
	}
	public function setskill($skill){
			$this->skill = $skill;
	}


	public function insertData(){

		$sql = "INSERT INTO $this->table(name, email, skill) VALUES(:name, :email, :skill)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':skill',$this->skill);

		return $stmt->execute();
	}

	public function update($id){
		$sql = "UPDATE $this->table SET name=:name, email=:email, skill=:skill Where id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':skill', $this->skill);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	public function readByid($id){
		$sql = "SELECT * FROM $this->table WHERE id=:id";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

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