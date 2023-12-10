<!-- php database connection -->
<?php
    include('../conn.php');
    error_reporting(0);
  ?>
  
<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign up</title>
  <link rel="stylesheet" href="../sign up/style.css" />
</head>

<body>
    <section class="container">
        <header>Contact us</header>
        <form action="#" method="POST" class="form">

            <div class="input-box">
                <label>Name</label>
                <input type="text" name="Name" placeholder="Enter your name" required />
            </div>
            
            <div class="input-box">
                <label>Email</label>
                <input type="email" name="Email" placeholder="Enter your Email" required />
            </div>

            <div class="input-box">
                <label>Phone no</label>
                <input type="number" name="phone_no" placeholder="Number" required />
            </div>
            
            <div class="input-box">
                <label>Subject</label>
                <input type="text" name="Text" placeholder="Subject" required maxlength="500"/>
            </div>
            
            <div class="input-box">
                <label>Message</label><br>
                <textarea name="Message" placeholder="Enter Your Massage" style="height: 50px;width: 100%; outline: none;font-size: 1rem;color: #707070;margin-top: 8px;border: 1px solid #ddd;border-radius: 6px;padding: 0 15px;" required></textarea>
            </div>

           


            <button type="Submit" class="btn" value="Send" name="Send">Send</button>
        </form>
    </section>
</body>
</html>


<!-- php database connection -->


<?php
  if (isset($_POST['Register'])) {

    $signup_as = $_POST['signup_as'];
    $f_name = $_POST['name'];
    $email  = $_POST['email'];
    $password  = $_POST['password'];
    $con_pass = $_POST['conf_pass'];
    $phone = $_POST['phone_no'];
    $dob  = $_POST['dob'];
    $gender = $_POST['gender'];
    $street = $_POST['street'];
    $landmark = $_POST['landmark'];
    $country = $_POST['country'];
    $city  = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $result = "SELECT * FROM signup WHERE phone = '$phone' AND password = '$password'";
    $none = mysqli_query($connection,$result);
    $no = mysqli_num_rows($none);

    if($no != 0){
      echo '<script>alert("User already exist")</script>';
    }else{
      if( $password != $con_pass ){
        echo '<script>alert("Password do not matched")</script>';
          }else{
            $data = "INSERT INTO signup VALUES('$signup_as' , '$f_name' ,	'$email' ,	'$password' ,	'$con_pass' ,	'$phone' ,	'$dob' ,	'$gender' ,	'$street' ,	'$landmark' ,	'$country' ,	'$city' ,	'$state' ,'$zip')";
            $query = mysqli_query($connection, $data);
            if ($data) {
            echo '<script>alert("Registered Successfully")</script>';
          }else{
          echo '<script>alert("Something Went Wrong!!Please Try Later")</script>';
        }
      }
    }
  }
?>