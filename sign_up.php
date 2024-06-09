<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS</title>
  <link rel="shortcut icon" href="images/logo.png"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="webcraft/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="webcraft/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="webcraft/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="webcraft/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="style/css/AdminLTE.min.css">
  <link rel="stylesheet" href="style/css/skins/_all-skins.min.css">
  
</head>
<body style="background-image:url(assets/images/breadcrumbs/1.png); background-size:cover;">
<br><br>
<section class="content">
    <div class="row">           
        <section>
            <div class="login-box">
    			<h1 class="text-center" style="color:white;">Sign Up</h1>
                <div class="login-box-body" style="background-color:transparent">
                    <form action="sign_up_save.php" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="name" placeholder="Name" required pattern="[a-zA-Z1 _]{3,50}">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="cntno1" placeholder="Contact No" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
                        </div>                        
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="username" placeholder="Username" required maxlength="20" minlength="5">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password" required maxlength="15" minlength="5">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="file" class="form-control" name="photo" required>
                        </div>
                        <div class="row">                                                          
                             <div class="col-xs-4 pull-right">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                            </div>  
                            <div class="col-xs-4 pull-right">    
                            	<br>              
                                <a href="login.php" class="btn btn-block btn-danger btn-flat">Back</a>
                           </div>                  
                        </div>                       
                    </form>  
                </div>
			</div> 	
        </section> 
    </div>
</section>
</body>
</html>

