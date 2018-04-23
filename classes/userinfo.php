<?php

include 'main.php';

class userinfo extends main{
	protected $table='users';
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

	// Insert data
	public function insertData(){

		$sql = "INSERT INTO $this->table(name, email, skill) VALUES(:name, :email, :skill)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':skill',$this->skill);

		return $stmt->execute();
	}
	// Update data
	public function update($id){
		$sql = "UPDATE $this->table SET name=:name, email=:email, skill=:skill Where id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':skill', $this->skill);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
	







}


 ?>