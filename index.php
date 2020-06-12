<!DOCTYPE HTML>
<html>
   <head>
      <title>SCP Foundation</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="assets/css/main.css" />
      <noscript>
         <link rel="stylesheet" href="assets/css/noscript.css" />
      </noscript>
   </head>
   <body class="is-preload">
      <?php include 'app/connection.php'; ?>
      <div id="page-wrapper">
         <!-- Header -->
         <header id="header">
            <h1 id="logo"><a href="index.php">SCP Foundation</a></h1>
            <nav id="nav">
               <ul>
                  <li><a href="index.php">Home</a></li>
                  <li>
                     <a href="#">Subjects</a>
                     <ul>
                        <?php foreach($result as $menu_item): ?>
                        <li>
                           <a href="index.php?subject='<?php echo $menu_item['Item_No']; ?>'">
                           <?php echo $menu_item['Item_No']; ?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                     </ul>
                  </li>
                  <li>
                     <a href="forms/insert.php">
                     ENTER NEW SUBJECT
                     </a>
                  </li>
               </ul>
            </nav>
         </header>
         <!-- Main -->
         <div id="main" class="wrapper style1">
            <div class="container">
               <?php
                  // check subject has valid value
                  echo $_GET['subject'];
                  if(isset($_GET['subject']))
                  {
                      //trim single quotes from subject query string
                      $item_number = trim($_GET['subject'], "'");
                  
                      //get selected subject value based on primary key
                      $record = $connection->query("select * from Subject where Item_No = '$item_number'") or die($connection->error);
                  
                      $row = $record->fetch_assoc();
                      
                      //Store DB Fields Value in Unique Variable
                      $item = $row['Item_No'];
                      $Object_class = $row['Object_class'];
                      $Procedures = $row['Procedures'];
                      $Description = $row['Description'];
                      $Subject_image_path = empty($row['Subject_image_path']) ? '' : $row['Subject_image_path'];
                      $Reference = empty($row['Reference']) ? '' : $row['Reference'];
                      $Additional_Notes = empty($row['Additional_Notes']) ? '' : $row['Additional_Notes'];
                      $Appendix = empty($row['Appendix']) ? '' : $row['Appendix'];
                      
                      $Procedures = str_replace('/n', '<br/><br/>', $Procedures);
                      $Description = str_replace('/n', '<br/><br/>', $Description);
                      $Reference = str_replace('/n', '<br/><br/>', $Reference);
                      $Additional_Notes = str_replace('/n', '<br/><br/>', $Additional_Notes);
                      $Appendix = str_replace('/n', '<br/><br/>', $Appendix);
                  
                  
                      $update ="forms/update.php?update=" .$item;
                      //$delete = "app/connection.php?delete=" .$item;
                      $delete = "forms/processing.php?delete=" .$item;
                  
                      // Display DB fields
                      echo "
                      <h2>SCP Subject</h2>
                      <h3>Item_#: {$item}</h3>
                      <h3>Class: {$Object_class}</h3>
                      <p><img src='{$Subject_image_path}'></p>
                      <h3>Special Containment Procedures:</h3>
                      <p>{$Procedures}</p>
                      <h3>Description:</h3>
                      <p>{$Description}</p>";
                  
                      if($Reference != ''){
                        echo "<h3>Reference:</h3>
                        <p>{$Reference}</p>";
                      }
                  
                      if($Additional_Notes != ''){
                        echo "<h3>Additional Notes:</h3>
                        <p>{$Additional_Notes}</p>";
                      }
                  
                      if($Appendix != ''){
                        echo "<h3>Appendix:</h3>
                        <p>{$Appendix}</p>";
                      }
                      
                      echo "
						<ul class='actions'>
							<li><a href='{$update}' class='button primary'>Update</a></li>
							<li><a href='{$delete}' class='button'>Delete</a></li>
				  		</ul>
					  ";
                  }
                  else
                  {
                    //If subject has not value than display common content
                    echo "<header class='major'>
                  <h2>SCP Foundation</h2>
                  <p>Welcome, Use the above links to view subject files or enter new subject data</p>
                  </header>
                  <div class='box alt'>
                     <div class='row gtr-50 gtr-uniform'>
                        <div class='col-12'><span class='image fit'><img src='images/scp_back.jpg' alt='' /></span></div>
                     </div>
                  </div>
                  ";
                  }
                  ?>
            </div>
         </div>
         <!-- Footer -->
         <footer id="footer">
            <ul class="copyright">
               <li>&copy; Comp.6210 Assignment 2 (CRUD Operation) <strong>Akshay (30026016)</strong>.</li>
            </ul>
         </footer>
      </div>
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>