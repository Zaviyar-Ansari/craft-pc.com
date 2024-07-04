<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$message = array(); // Initialize an array to store messages

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_contact_number = mysqli_real_escape_string($conn, $_POST['update_contact_number']); // Corrected variable name
   $update_gender = mysqli_real_escape_string($conn, $_POST['update_gender']);
   $update_birthday = mysqli_real_escape_string($conn, $_POST['update_birthday']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

   // Update user information
   $update_query = "UPDATE `profile1` SET name = '$update_name', email = '$update_email', contact = '$update_contact_number', gender = '$update_gender', birthday = '$update_birthday', address = '$update_address' WHERE id = '$user_id'";
   $result = mysqli_query($conn, $update_query);

   if(!$result){
      $message[] = 'Update failed: ' . mysqli_error($conn);
   }

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'Old password not matched!';
      } elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password not matched!';
      } else {
         // Update user password
         $pass_update_query = "UPDATE `profile1` SET password = '$confirm_pass' WHERE id = '$user_id'";
         $pass_update_result = mysqli_query($conn, $pass_update_query);

         if(!$pass_update_result){
            $message[] = 'Password update failed: ' . mysqli_error($conn);
         } else {
            $message[] = 'Password updated successfully!';
         }
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image is too large';
      } else {
         // Update user image
         $image_update_query = "UPDATE `profile1` SET image = '$update_image' WHERE id = '$user_id'";
         $image_update_result = mysqli_query($conn, $image_update_query);

         if(!$image_update_result){
            $message[] = 'Image update failed: ' . mysqli_error($conn);
         } else {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            $message[] = 'Image updated successfully!';
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
   <title>Update Profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `profile1` WHERE id = '$user_id'") or die('Query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         } else {
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $msg){
               echo '<div class="message">'.$msg.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username:</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>Email:</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Contact Number:</span>
<input type="text" name="update_contact_number" value="<?php echo isset($fetch['contact']) ? $fetch['contact'] : ''; ?>" class="box">
            <span>Gender:</span>
            <select name="update_gender" class="box">
               <option value="male" <?php if($fetch['gender'] == 'male') echo 'selected'; ?>>Male</option>
               <option value="female" <?php if($fetch['gender'] == 'female') echo 'selected'; ?>>Female</option>
               <option value="other" <?php if($fetch['gender'] == 'other') echo 'selected'; ?>>Other</option>
            </select>
            <span>Birthday:</span>
            <input type="date" name="update_birthday" value="<?php echo $fetch['birthday']; ?>" class="box">
            <span>Address:</span>
            <textarea name="update_address" class="box"><?php echo $fetch['address']; ?></textarea>
            <span>Update Your Picture:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old Password:</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New Password:</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm Password:</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update Profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Go Back</a>
   </form>

</div>

</body>
</html>
