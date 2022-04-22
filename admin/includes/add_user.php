<?php 

    //inserting post data from admin
    if(isset($_POST['create_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];

/*        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];*/

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
       //$post_date = date('d-m-y');

        //moves files from temp location to root directory of image
       // move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO users (user_firstname, user_lastname, user_role, 
        user_name, user_email, user_password) ";

        //"now" function is a date function
        $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', 
        '{$user_name}', '{$user_email}', '{$user_password}')";

        //A query for creating user in the database/site
        $create_user_query = mysqli_multi_query($connection, $query);

        confirmQuery($create_user_query);

        echo "<p class='alert alert-success text-center'>User Created:" . " " . "<a href='users.php'>View Users</a></p>";


    }

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
      <select name="user_role" id="">
        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
      </select>
    </div>

    
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
        -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>

</form>