
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel ="stylesheet" type= "text/css" href="css/style2.css">
</head>
<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        


    <form 
        class="shadow w-450 p-3" 
        action="php/signup.php" 
        method="post">

    <h4 class="display-4  fs-1">Create Account</h4><br>
      
    <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>    
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['success']; ?>
        </div>    
        <?php } ?>
        <div class="mb-3">
        <label class="form-label">Full name</label>
        <input
            type="text"
            class="form-control"
            name="fname" 
            value="<?php if(!empty($_GET['fname'])) echo $_GET['fname']; ?>">
        </div>

        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="text"
            class="form-control" 
            name="uname"
            value="<?php if(!empty($_GET['uname'])) echo $_GET['uname']; ?>">
            
            
        </div>

        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control"  name="pass" >
        </div>
        <div class="mb-3">
			<label class="form-label">Status</label>
			<select class="form-control" name="status" required="required">
				<option class="form-control" value="2">User</option>
				<option class="form-control" value="1">Doctor</option>
			</select>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <a href="login.php" class="link-secondary">Login</a>
    </form>
        </div>

    </div>
</body>
</html>