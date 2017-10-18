<!DOCTYPE html>
<html>
  <head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
  
  <body>
 		<nav class="navbar navbar-default">
			<div class="container-fluid">
				
				<div class="navbar-header">
					<h5>
						Game On Mizzou!
					</h5>
				</div>

				
			</div>
		
		</nav>   
  <div class="container">

    <div class="jumbotron">
      <h2>Please sign in.</h2>
      <form role="form" action="login-handler.php" method="POST">
        
        <input type="hidden" name="action" value="continue">
        
        <div class="form-group">
          <label for="user">Username:</label>
          <input type="user" name="username" class="form-control" id="user">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" name="password" class="form-control" id="pwd">
        </div>
				<?php
					if($error) {
						print "<div class='alert alert-warning'>$error</div>\n";
						
					}
				?>

        <button type="submit" class="btn btn-default">Login</button>
      </form>
    </div>

  </div>

    
    
    
    
  </body>
</html>