<!DOCTYPE HTML>
<html>
   <head>
      <title>SCP Foundation</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="../assets/css/main.css" />
      <noscript>
         <link rel="stylesheet" href="../assets/css/noscript.css" />
      </noscript>
   </head>
   <body class="is-preload">
      <div id="page-wrapper">
         <!-- Header -->
         <header id="header">
            <h1 id="logo"><a href="../index.php">SCP Foundation</a></h1>
            <nav id="nav">
               <ul>
                  <li><a href="../index.php">Home</a></li>
               </ul>
            </nav>
         </header>
         <?php
            require '../app/connection.php';
            //If Post click occures than below code will execute
                session_start();
                if(isset($_POST['submit']))
                {
                    $Item_No = mysqli_real_escape_string($connection, $_POST['Item_No']);
            
                    //Check if Item Number already exist in DB
                    $check = mysqli_query($connection,"select * from Subject where Item_No='$Item_No'");
                    $checkrows = mysqli_num_rows($check);
            
                    //If Item Number already exist than show warning message.
                    if($checkrows > 0) {
                        echo "
                        <section id='brand' class='wrapper style1 special fade-up'>
                            <div class='container'>
                                <div class='box alt'>
                                    <div class='row gtr-uniform'>
                                        <section class='col-12 col-6-medium col-12-xsmall'>
                                            <span class='icon solid alt major fa-exclamation-triangle'></span>
                                            <h3>Warning</h3>
                                            <p><strong>Subject already exists!</strong> Please enter new Subject.</p>
                                        </section>
                                    </div>
                                </div>
                                <footer class='major'>
                                    <ul class='actions special'>
                                    <li><a href='insert.php' class='button'>Back</a></li>
                                    </ul>
                                </footer>
                            </div>
                        </section>
                        ";
                    }
                    else{
                        //Set all $_POST values into separate variables to insert in DB
                        $Object_class = mysqli_real_escape_string($connection, $_POST['Object_class']);
                        $Subject_image_path = mysqli_real_escape_string($connection, $_POST['Subject_image_path']);
                        $Description = $_POST['Description'];
                        $Procedures = $_POST['Procedures'];
                        $Reference = $_POST['Reference'];
                        $Additional_Notes = $_POST['Additional_Notes'];
                        $Appendix = $_POST['Appendix'];
            
                        $Description = str_replace("'", "''", $Description);
                        $Procedures = str_replace("'", "''", $Procedures);
                        $Reference = str_replace("'", "''", $Reference);
                        $Additional_Notes = str_replace("'", "''", $Additional_Notes);
                        $Appendix = str_replace("'", "''", $Appendix);
            
                        //Insert record into DB
                        $sql = "insert into Subject(Item_No, Object_class, Subject_image_path, Description, Procedures, Reference, Additional_Notes, Appendix) values('$Item_No', '$Object_class', '$Subject_image_path', '$Description', '$Procedures', '$Reference', '$Additional_Notes', '$Appendix')"; 
            
                        if ($connection->query($sql) === TRUE) {
                            //If Insert statement execute without error than show successfully message
            
                            echo "
                                <section id='brand' class='wrapper style1 special fade-up'>
                                    <div class='container'>
                                        <div class='box alt'>
                                            <div class='row gtr-uniform'>
                                                <section class='col-12 col-6-medium col-12-xsmall'>
                                                    <span class='icon solid alt major fa-thumbs-up'></span>
                                                    <h3>Success</h3>
                                                    <p><strong>Subject created successfully.</strong></p>
                                                </section>
                                            </div>
                                        </div>
                                        <footer class='major'>
                                        <ul class='actions special'>
                                            <li><a href='insert.php' class='button'>Back</a></li>
                                        </ul>
                                    </footer>
                                    </div>
                                </section>
                                ";
                        }
                        else 
                        {
                            echo "
                                <section id='brand' class='wrapper style1 special fade-up'>
                                    <div class='container'>
                                        <div class='box alt'>
                                            <div class='row gtr-uniform'>
                                                <section class='col-12 col-6-medium col-12-xsmall'>
                                                    <span class='icon solid alt major fa-exclamation'></span>
                                                    <h3>Success</h3>
                                                    <p><strong>Error! </strong>{$connection->error}</p>
                                                </section>
                                            </div>
                                        </div>
                                        <footer class='major'>
                                        <ul class='actions special'>
                                            <li><a href='insert.php' class='button'>Back</a></li>
                                        </ul>
                                    </footer>
                                    </div>
                                </section>
                                ";
                        }
                    }
                }
                if(isset($_GET['delete']))
                {
                    $item_number = trim($_GET['delete'], "'");
            
                    $deleteData = "delete from Subject where Item_No = '$item_number'";
            
                    if($connection->query($deleteData) === TRUE)
                    {
                        echo "
                        <section id='brand' class='wrapper style1 special fade-up'>
                            <div class='container'>
                                <div class='box alt'>
                                    <div class='row gtr-uniform'>
                                        <section class='col-12 col-6-medium col-12-xsmall'>
                                            <span class='icon solid alt major fa-thumbs-up'></span>
                                            <h3>Success</h3>
                                            <p><strong>Subject deleted successfully.</strong></p>
                                        </section>
                                    </div>
                                </div>
                                <footer class='major'>
                                    <ul class='actions special'>
                                        <li><a href='insert.php' class='button'>Back</a></li>
                                    </ul>
                                </footer>
                            </div>
                        </section>";
                    }
                    else
                    {
                        echo "
                        <section id='brand' class='wrapper style1 special fade-up'>
                            <div class='container'>
                                <div class='box alt'>
                                    <div class='row gtr-uniform'>
                                        <section class='col-12 col-6-medium col-12-xsmall'>
                                            <span class='icon solid alt major fa-exclamation'></span>
                                            <h3>Success</h3>
                                            <p><strong>Error! </strong>{$connection->error}</p>
                                        </section>
                                    </div>
                                </div>
                                <footer class='major'>
                                    <ul class='actions special'>
                                        <li><a href='insert.php' class='button'>Back</a></li>
                                    </ul>
                                </footer>
                            </div>
                        </section>";
                    }
                }
            
                //If Post click occures than below code will execute
                if(isset($_POST['update']))
                {
                    //Set all $_POST values into separate variables to insert in DB
                    
                    $Item_No = mysqli_real_escape_string($connection, $_POST['Item_No']);
                    $Object_class = mysqli_real_escape_string($connection, $_POST['Object_class']);
                    $Subject_image_path = mysqli_real_escape_string($connection, $_POST['Subject_image_path']);
                    $Description = $_POST['Description'];
                    $Procedures = $_POST['Procedures'];
                    $Reference = $_POST['Reference'];
                    $Additional_Notes = $_POST['Additional_Notes'];
                    $Appendix = $_POST['Appendix'];
            
                    $Description = str_replace("'", "''", $Description);
                    $Procedures = str_replace("'", "''", $Procedures);
                    $Reference = str_replace("'", "''", $Reference);
                    $Additional_Notes = str_replace("'", "''", $Additional_Notes);
                    $Appendix = str_replace("'", "''", $Appendix);
            
                    //Update record into DB
                    $update = "update Subject set Object_class = '$Object_class', Subject_image_path = '$Subject_image_path',
                    Description = '$Description', Procedures = '$Procedures', Reference = '$Reference', Additional_Notes = '$Additional_Notes', Appendix = '$Appendix' where Item_No = '$Item_No'";
            
                    if ($connection->query($update) === TRUE) {
                        //If Insert statement execute without error than show successfully message
            
                        echo "
                        <section id='brand' class='wrapper style1 special fade-up'>
                            <div class='container'>
                                <div class='box alt'>
                                    <div class='row gtr-uniform'>
                                        <section class='col-12 col-6-medium col-12-xsmall'>
                                            <span class='icon solid alt major fa-thumbs-up'></span>
                                            <h3>Success</h3>
                                            <p><strong>Subject updated successfully.</strong></p>
                                        </section>
                                    </div>
                                </div>
                                <footer class='major'>
                                    <ul class='actions special'>
                                        <li><a href='insert.php' class='button'>Back</a></li>
                                    </ul>
                                </footer>
                            </div>
                        </section>";
                    }
                    else 
                    {
                        //If Insert statement execute without error than show error message
            
                        echo "
                        <section id='brand' class='wrapper style1 special fade-up'>
                            <div class='container'>
                                <div class='box alt'>
                                    <div class='row gtr-uniform'>
                                        <section class='col-12 col-6-medium col-12-xsmall'>
                                            <span class='icon solid alt major fa-exclamation'></span>
                                            <h3>Success</h3>
                                            <p><strong>Error! </strong>{$connection->error}</p>
                                        </section>
                                    </div>
                                </div>
                                <footer class='major'>
                                    <ul class='actions special'>
                                        <li><a href='insert.php' class='button'>Back</a></li>
                                    </ul>
                                </footer>
                            </div>
                        </section>";
                    }
                }
            ?>
         <!-- Footer -->
         <footer id="footer">
            <ul class="copyright">
               <li>&copy; Untitled. All rights reserved.</li>
               <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
         </footer>
      </div>
      <!-- Scripts -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/jquery.scrolly.min.js"></script>
      <script src="../assets/js/jquery.dropotron.min.js"></script>
      <script src="../assets/js/jquery.scrollex.min.js"></script>
      <script src="../assets/js/browser.min.js"></script>
      <script src="../assets/js/breakpoints.min.js"></script>
      <script src="../assets/js/util.js"></script>
      <script src="../assets/js/main.js"></script>
   </body>
</html>