<?php include "header.php";?>

<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="admin-heading">Website settings</h1>
			</div>
			<div class="col-md-offset-3 col-md-6">
				<?php 
                 include 'config.php';

                $sql = "SELECT * FROM settings";
                    $result = mysqli_query($conn,$sql) or die("query failed");
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){

                 ?>
				<form action="save-settings.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="website_name">name</label>
						<input type="text" name="website_name" class="form-control" value="<?php echo $row['websitename'];?>" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="logo">Website logo</label>
						<input type="file" name="logo">
						<img src="images/<?php echo $row['logo']; ?>">
						<input type="hidden" name="old_logo" value="<?php echo $row['logo'];?>">
					</div>
					<div class="form-group">
						<label for="footer_desc">Footer description</label>
						<textarea name="footer_desc" class="form-control" row="5" required>
							<?php echo $row['footerdesc'];?>
						</textarea>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="save">
				</form>
				<?php
			}
		}
		?>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
