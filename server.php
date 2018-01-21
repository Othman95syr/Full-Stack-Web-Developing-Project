<?php 
	
	session_start();
	//initialize variables
	$name = "";
	$surename = "";
	$contact = "";
	$address = "";
	$nationality = "";
	$gender = '';
	$id = 0;
	$edit_state = false;
	
	//connction
	try {
		$db = mysqli_connect('localhost', 'root', '', 'customers');
	} catch (Exception $ex) {
		echo "Error in connection !";
	}
	

	//when save button clicked //record or save crud
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$surename = $_POST['surename'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$nationality = $_POST['nationality'];
		$gender = $_POST['gender'];

		$query1 = "INSERT INTO info (name, surename, contact, address, nationality, gender) VALUES ('$name', '$surename', '$contact', '$address', '$nationality', '$gender')";
		mysqli_query($db, $query1); 
		$_SESSION['msg'] = "Data Saved :)";
		header('location: index.php'); //redirect the user to index page after saving
		
	}

	//update crud
	if (isset($_POST['update']))  {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$surename = $_POST['surename'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$nationality = $_POST['nationality'];
		$gender = $_POST['gender'];

		mysqli_query($db, "UPDATE info SET name='$name', surename='$surename', contact='$contact', address='$address', nationality='$nationality', gender='$gender' WHERE id=$id");
		$_SESSION['msg'] = "Data Updated :)";
		header('location: index.php'); 
	}

	//delete crud
	if (isset($_GET['del']))  {

		$id = $_GET['del'];

		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "Data Deleted :)";
		header('location: index.php'); 
	}


   //read crud selects all the data so the user can read them
	$query2 = "SELECT * FROM info";
	$results = mysqli_query($db, $query2);
