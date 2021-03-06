<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Dates</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <!-- class='img-responsive' is very important in bootstrap -->
                        <?php 
                        
                        $query = "SELECT * FROM posts "; 
                        $select_posts = mysqli_query($connection, $query); 
                    
                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category_id = $row['post_category_id'];
                            $post_status = $row['post_status'];
                            $post_image = $row['post_image'];
                            $post_tags = $row['post_tags'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_date = $row['post_date'];

                            echo "<tr>";
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";

                            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} "; 
                            $select_categories_id = mysqli_query($connection, $query); 

                            while($row = mysqli_fetch_assoc($select_categories_id)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                            echo "<td>{$cat_title}</td>";


                            }



                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_date}</td>";
                            //&p_id becomes the new post id and also adding the source is very important
                            echo "<td><a class='btn btn-success' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                            echo "<td><a class='btn btn-danger' href='posts.php?delete={$post_id}'>Delete</a></td>";
                            echo "</tr>";

                        }
                        
                        ?>
                    
                    </tbody>
                    </table>


                    <?php 
                    //make a get superglobal request
                    //MAKING A DELETE QUERY FOR POSTS
                        if(isset($_GET['delete'])){
                            global $connection;
                            $the_post_id = $_GET['delete'];

                            $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: posts.php");

                            confirmQuery($delete_query);

                        }
                    
                    ?>
                
                




            <!--    -->