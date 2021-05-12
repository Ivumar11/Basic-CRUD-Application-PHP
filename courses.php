<?php
include("header.php");
require("database.php");

?>
        
        <main>
        <h2 class="dash-title">Courses</h2>
        

        <?php

            if (isset($_GET['del'])) {
                $_SESSION['tmp_id'] = $_GET['del'];
                ?>
                <center><div class=form style="position: absolute; right: 35%; top: 30%; z-index: 10;">
                    <h4>Are you sure you want to delete this course?</h4>
                    <p>
                    <span style="float: left; margin-top: 5px;">
                    <a href="courses.php?delete=NO"><button style="padding: 3px 5px 3px 5px">NO</button></a></span>
                    <span style="float: right; margin-top: 5px;">
                    <a href="courses.php?delete=YES"><button style="padding: 3px 5px 3px 5px">YES</button></a></span>
                    </p>
                </div>
                </center>
                <?php
            }

            if (isset($_GET['delete'])) {
                $delete = $_GET['delete'];
                if ($delete == "YES") {
                    $id = $_SESSION['tmp_id'];
                    $sql = "DELETE FROM courses WHERE reg_id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "";
                    } else {
                        echo "An error occured";
                    }
                    unset($_SESSION['tmp_id']);
                } else {
                    header("Location: courses.php");
                    exit();
                }
            }

            if (isset($_POST['edit'])) {
                $reg_id = $_POST['reg_id'];
                $course_code = $_POST['course_code'];
                $course_title = $_POST['course_title'];

                $sql = "UPDATE courses SET course_code='$course_code', course_title='$course_title' WHERE reg_id ='$reg_id'";
                $result = $conn->query($sql);
                if ($result === TRUE) {
                    echo "yes!!";
                } else {
                    echo "Something went wrong";
                }
            }

            $id = $_SESSION['id'];

            $sql    = "SELECT * FROM courses WHERE id = '$id'";
            
            $result = $conn->query($sql);
            if ($result->num_rows < 1) {
                ?>
                <center><div class=form>
                    <h4>You have not registered for any course yet</h4>
                </div></center>
            <?php    
            } else {
                while ($row = $result->fetch_assoc()) {
                    ?>
            <div class="dash-cards">
                <div class="card-single" style="margin-bottom: 10px;">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5><?php echo $row["course_code"];?></h5>
                            <h5><?php echo $row["course_title"];?></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="edit.php?edit=<?php echo $row["reg_id"];?>">Edit course</a>
                        <a href="courses.php?del=<?php echo $row["reg_id"];?>" style="float: right;">Delete</a>
                    </div>
                </div>
                <?php
                }
            }
            ?>
        
            </div>
            
        </main>
        
    </div>
    
</body>
</html>