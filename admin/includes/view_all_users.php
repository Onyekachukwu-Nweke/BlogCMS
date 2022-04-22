<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <!-- class='img-responsive' is very important in bootstrap -->
                        <?php 
                        
                        $query = "SELECT * FROM users "; 
                        $select_users = mysqli_query($connection, $query); 
                    
                        while($row = mysqli_fetch_assoc($select_users)) {
                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                            
                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td>{$user_name}</td>";
                            echo "<td>{$user_firstname}</td>";
                            echo "<td>{$user_lastname}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_role}</td>";

                           /* $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
                            $select_post_id_query = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_post_id_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];

                                echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";

                            }*/

                            //echo "<td>{$comment_date}</td>";
                            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                            echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                            //edit_user becomes the new user id and also adding the source is very important
                            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                            echo "</tr>";

                        }
                        
                        ?>
                    
                    </tbody>
                    </table>


                    <?php 
                    //make a get superglobal request

                    if(isset($_GET['change_to_admin'])){
                        global $connection;
                        $the_user_id = $_GET['change_to_admin'];

                        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id} ";
                        $change_to_admin_query = mysqli_query($connection, $query);
                        header("Location: users.php");

                        confirmQuery($change_to_admin_query);

                    }


                        //MAKING A QUERY FOR UNAPPROVING COMMENTS
                        if(isset($_GET['change_to_sub'])){
                            global $connection;
                            $the_user_id = $_GET['change_to_sub'];
    
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id} ";
                            $change_to_sub_query = mysqli_query($connection, $query);
                            header("Location: users.php");
    
                            confirmQuery($change_to_sub_query);
    
                        }
    

                    //MAKING A DELETE QUERY FOR POSTS
                        if(isset($_GET['delete'])){
                            global $connection;
                            $the_user_id = $_GET['delete'];

                            $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: users.php");

                            confirmQuery($delete_query);

                        }
                    
                    ?>
                
                




            <!--    -->