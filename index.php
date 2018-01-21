<?php include('server.php');
	
	//fetch the record to be updated

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$id = $record['id'];
		$name = $record['name'];
		$surename = $record['surename'];
		$contact = $record['contact'];
		$address = $record['address'];
		$nationality = $record['nationality'];
		$gender = $record['gender'];
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>2.Project</title>
</head>
	<style>
		body {
    			font-size: 19px;
		}
		table{
    			width: 90%;
    			margin: 70px auto;
    			border-collapse: collapse;
    			text-align: left;
		}
		tr {
    			border-bottom: 1px solid #bbbb8b;
		}
		th, td{
    			border: none;
    			height: 40px;
    			padding: 2px;
		}
		tr:hover {
    			background: lightgrey;
		}

		form {
    		width: 45%;
    		margin: 50px auto;
    		text-align: left;
    		padding: 20px; 
    		border: 1px solid #bbbb8b; 
    		border-radius: 5px;
		}

		.input-group {
    		margin: 10px 0px 10px 0px;
		}
		.input-group label {
    		display: block;
    		text-align: left;
    		margin: 3px;

		}
		.input-group input {
    		height: 30px;
    		width: 93%;
    		padding: 5px 10px;
    		font-size: 16px;
    		border-radius: 5px;
    		border: 1px solid gray;
    		background: lightgrey;
		}
		.btn {
    		padding: 10px;
    		font-size: 15px;
    		color: white;
    		background: #5F9EA0;
    		border: none;
    		border-radius: 5px;
		}
		.edit_btn {
    		text-decoration: none;
    		padding: 2px 5px;
    		background: green;
    		color: white;
    		border-radius: 3px;
		}

		.del_btn {
    		text-decoration: none;
    		padding: 2px 5px;
    		color: white;
    		border-radius: 3px;
    		background: #800000;
		}
		.sel_btn {
    		text-decoration: none;
    		padding: 2px 5px;
    		color: white;
    		border-radius: 3px;
    		background: darkblue;
		}
		.msg {
    		margin: 30px auto; 
    		padding: 10px; 
    		border-radius: 5px; 
    		color: #3c763d; 
    		background: #dff0d8; 
    		border: 1px solid #3c763d;
    		width: 50%;
    		text-align: center;
		}
	</style>	
<body style="background-color:#2E8B57;">

	<h1 style="color: black; text-align:center; font-family:Georgia;"><i>Customers List</i></h1>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']); 
			?>
		</div>
	<?php endif ?>	
	<table>
		<thead>
			<tr>
				<th><b>Name</b></th>
				<th><b>Surename</b></th>
				<th><b>Contact</b></th>
				<th><b>Address</b></th>
				<th><b>Nationality</b></th>
				<th><b>Gender</b></th>
				<th colspan="2"><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['surename']; ?></td>
				<td><?php echo $row['contact']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['nationality']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
				<td><a  class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a></td>
			</tr>
		<?php } ?>	
		</tbody>
	</table>
	<form method="post" action="server.php">
		<p style="color: black ; text-align:center; font-size: 150%;"><u>New Customers Informations</u></p>
	<input type="hidden" name="id" value= "<?php echo $id; ?>">	
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Surename</label>
			<input type="text" name="surename" value="<?php echo $surename; ?>">
		</div>
		<div class="input-group">
			<label>Contact</label>
			<input type="text" name="contact" value="<?php echo $contact; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Nationality</label>
			<input type="text" name="nationality" value="<?php echo $nationality; ?>">
		</div>
		<div class="input-group">
			<label>Gender</label>
			<input type="text" name="gender" value="<?php echo $gender; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn">Save</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn">Update</button>
		<?php endif ?>
		</div>

	</form>
	
</body>
</html>