<?php
include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']); // Store password in its original form
   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `profile1` WHERE email = '$email'") or die('Query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'User already exists';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'Image size is too large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `profile1` (name, email, contact, gender, birthday, address, password, image) VALUES ('$name', '$email', '$contact_number', '$gender', '$birthday', '$address', '$pass', '$image')") or die('Query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'Registration failed!';
         }
      }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter First Name" class="box" required>
      <input type="email" name="email" placeholder="Enter Email" class="box" required>
      <input type="text" name="contact_number" placeholder="Enter Contact Number" class="box" required>
      <select name="gender" class="box" required>
         <option value="male">Male</option>
         <option value="female">Female</option>
         <option value="other">Other</option>
      </select>
      <input type="date" name="birthday" class="box" required>
      <textarea name="address" placeholder="Enter Address" class="box" required></textarea>
      <input type="password" name="password" placeholder="Enter Password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      <p>Already have an account? <a href="login.php">Login Now</a></p>
   </form>

</div>

</body>
</html>