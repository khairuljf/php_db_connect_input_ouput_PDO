<?php include 'header.php'; ?>

<?php 

	include 'userinfo.php';

 ?>

 <div class="row">
<br><br>
	<div class="col-md-4">

	<?php
	$users = new userinfo;


	// Insert data
	if(isset($_POST['submited'])){

		$name=$_POST['name'];
		$email=$_POST['email'];
		$skill=$_POST['skill'];

		$users->setName($name);
		$users->setMail($email);
		$users->setskill($skill);

		$success = $users->insertData();

			if($success){
				echo 'Data Saved!';
			}
			else{
				echo 'Something Wrong';
			}


	}

	// Update Data
	if(isset($_POST['updates'])){

		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$skill=$_POST['skill'];

		$users->setName($name);
		$users->setMail($email);
		$users->setskill($skill);
		$users->update($id);

		if($users->update($id)){
			echo 'Update Successfully';
		}
		else{
			echo "Something Wrong";
		}

	}




	 ?>



	 <?php
	//Edit View
	 	if(isset($_GET['action']) && $_GET['action']=='update'){
	 			$id = (int)$_GET['id'];
				$result = $users->readByid($id);

	  ?>


	  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	  	<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
		<label>Name</label>
		<input class="form-control" value="<?php echo $result['name']; ?>" type="text"  name="name">
		<label>Email</label>
		<input class="form-control" value="<?php echo $result['email']; ?>" type="email"  name="email">
		<label>Skill</label>
		<input  class="form-control" value="<?php echo $result['skill']; ?>" type="text"  name="skill">
		<br>
		<input type="submit" value="update" class="btn btn-lg btn-success" name="updates">

		</form>




<?php }

	elseif (isset($_GET['action']) && $_GET['action']=="delete") {

			$id = $_GET['id'];

			$success = $users->dataDelete($id);

			if($success){
				echo "Data removed!!";
			}
			else{
				echo 'Something Wrong!';
			}
		
	}



 else { ?>




		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

		<label>Name</label>
		<input class="form-control" type="text" placeholder="Enter your Name:" name="name">
		<label>Email</label>
		<input class="form-control"  type="email" placeholder="Enter your email:" name="email">
		<label>Skill</label>
		<input  class="form-control" type="text" placeholder="Enter your skill:" name="skill">
		<br>
		<input type="submit" class="btn btn-lg btn-success" name="submited">

		</form>

		<?php } ?>
		
	</div>


	<div class="col-md-8">

		<table class="table table-bordered table-hover">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Skill</th>
				<th>Action</th>
			</tr>

			<?php
			$i=0;
				foreach($users->readall() as $key => $value) {
					$i++;
			 ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['skill']; ?></td>
				<td>

					<button class="btn-info" >
					<?php echo "<a href='index.php?action=update&id=".$value['id']."'>Edit</a>"; ?>
						
					</button>
				 	|| 
					 <button class="btn-warning" >

					 <?php echo "<a href='index.php?action=delete&id=".$value['id']."'>Delete</a> "; ?>
					 	
					 </button>
				</td>
			</tr>
			<?php } ?>
			
		</table>
		

	</div>
</div>



<?php include 'footer.php'; ?>