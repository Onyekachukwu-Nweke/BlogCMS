<?php 

//To get the elements of the selected id from the database
    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = {$the_user_id} "; 
        $select_users_query = mysqli_query($connection, $query); 
    
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }

    }

    //Updating user data from admin
    if(isset($_POST['edit_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];

/*        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];*/

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE user_id = {$the_user_id} ";

        $update_user = mysqli_query($connection, $query);
        confirmQuery($update_user);
        

    }

    
      

        

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
    </div>

    <div class="form-group">
      <select name="user_role" id="">
      <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
        <?php 
        
        if($user_role == 'admin'){
            echo "<option value='subscriber'>subscriber</option>";
        } else{
            echo "<option value='admin'>admin</option>";
        }
        
        ?>
  
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
        <input type="text" class="form-control" value="<?php echo $user_name; ?>" name="user_name">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>

</form>