<?php 
	include('inc/head.php'); 
	session_start();
	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location:index.php');
	}

?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="index.php" class="navbar-brand mr-3">SPI Leave Application</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav">
					<li class="nav-item px-2"><a href="index.php" class="nav-link active">Welcome Admin</a></li>
					
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">
						
						<li class="nav-item">
							<a href="logout.php" class="nav-link"><i class="fa fa-user-times"></i> Log Out</a>
						</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-gear"></i> Welcome Admin</h1>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-plus"></i> Pending Leaves</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-plus"></i> Proccessed</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-plus"></i> Total Leave</a>
				</div>
			</div>
		</div>
	
	</section>
	<!-- Designed and developed by Habibur Rahman Mahid 01845635308 -->
	<!----Section2 for showing Post Model gula nice takbe ---->
	<section id="post">
		<div class="container">
			<div class="row">
				<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th>Department</th>
								<th>Roll</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['roll']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Pending";
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 		}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead">Copyright 2018 &copy; SPI</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Designed and developed by Habibur Rahman Mahid 01845635308 -->
	
	<!-- Creating Modal -->
    <!-- Header Post -->
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Pending</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th>Department</th>
								<th>Roll</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 0";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['roll']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Pending";
							 				?>
							 				</td>
							 		<td>
							 			<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approve">
							 			</form>
							 		</td>
							 				<?php
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 		}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!-- Designed and developed by Habibur Rahman Mahid 01845635308 -->
	<!--Modal Category-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>New Accepted</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th>Department</th>
								<th>Roll</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['roll']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Pending";
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 		}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Designed and developed by Habibur Rahman Mahid 01845635308 -->
	<!-- User Modal -->
	<div class="modal fade" id="addUsertModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Total Leaves</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th>Department</th>
								<th>Roll</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 1";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['roll']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Pending";
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 		}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>
  <!-- Designed and developed by Habibur Rahman Mahid 01845635308 -->
</body>
</html>
