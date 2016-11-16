
<?php
if (isset( $_POST['hey']))
{
  header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/lumberGeni/css/style.css">
	</head>
	<body>
		<div class="container">
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">File Already Existed!</h4>
            </div>
            <div class="modal-body">
              <p>We went ahead and used the version you just uploaded.</p>
            </div>
            <div class="modal-footer">
              <form action="" method="POST">
                <button type="submit" class="btn btn-defualt" name="hey">Continue</button>
              </form>
            </div>
          </div>

        </div>
      </div>

			<form action="" method="POST" enctype="multipart/form-data">
				<span class="btn btn-default btn-file">Upload<input type="file" name="text" onchange="this.form.submit();" /></span>
			</form>
		</div>
	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	// This is the index page.
	if(isset($_FILES['text']))
	{
		$errors = array();
		$file_name = $_FILES['text']['name'];
		$file_size = $_FILES['text']['size'];
		$file_tmp = $_FILES['text']['tmp_name'];
		$file_type = $_FILES['text']['type'];
		$file_ext = strtolower(end(explode('.',$_FILES['text']['name'])));

		$expensions = array("txt");

		if(in_array($file_ext, $expensions) === false)
		{
			$errors[] = "extension not allowed, please choose a .txt file";
		}

		if(empty($errors) == true)
		{
      if(file_exists("/xampp/htdocs/lumberGeni/files/".$file_name))
      {
        ?>
          <script>
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
          </script>
        <?php
      }
      else
      {
        move_uploaded_file($file_tmp, "/xampp/htdocs/lumberGeni/files/".$file_name);
        header('Location: index.php');
      }
		}
		else
		{

      print_r($errors);
		}
	}
?>
