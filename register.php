<?php

session_start();
include('server/connection.php');
if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}
if(isset($_POST['register'])){
   $name = $_POST['name']; 
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmPassword = $_POST['confirmPassword'];

        if($password!== $confirmPassword){
            header('location: register.php?error=Passwords do not match!');
        }
        else if(strlen($password)<6){
            header('location: register.php?error=Passwords must be atleast of 6 characters!');
        }
        else{
        //check whether there is user already from same email or not
        $stmt1= $conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

            if($num_rows !=0){
            header('location: register.php?error=User already exists!');
            }
            else{
            //create a new user
            $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                VALUES (?,?,?)");

            $stmt->bind_param('sss',$name,$email,md5($password));
                

                if($stmt->execute()){
                        $user_id=$stmt->insert_id;
                        $_SESSION['user_id']=$user_id;
                        $_SESSION['user_email']=$email;
                        $_SESSION['user_name']=$name;
                        $_SESSION['logged_in']=true;
                        header('location: account.php?register_success=Registration Complete!');
                }
                else{
                    header('location:register.php?error=Could not create an account!');
                }
            }
        }
}

?>

<?php include('layouts/header.php');?>

    <!--Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
             <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'] ; }?></p>   
            <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" id="register-name"  required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"class="form-control" id="register-email"  required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="register-password"  required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password"  name="confirmPassword"class="form-control" id="register-password"  required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn" id="register-btn" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php"class="btn">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </section>


    <?php include('layouts/footer.php');?>