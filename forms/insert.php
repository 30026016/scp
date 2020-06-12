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
      <?php include '../app/connection.php'; ?>
      <div id="page-wrapper">
         <!-- Header -->
         <header id="header">
            <h1 id="logo"><a href="../index.php">SCP Foundation</a></h1>
            <nav id="nav">
               <ul>
                  <li><a href="../index.php">Home</a></li>
                  <li>
                     <a href="#">Subjects</a>
                     <ul>
                        <?php foreach($result as $menu_item): ?>
                        <li>
                           <a href="../index.php?subject='<?php echo $menu_item['Item_No']; ?>'">
                           <?php echo $menu_item['Item_No']; ?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                     </ul>
                  </li>
                  <li>
                     <a href="insert.php">
                     ENTER NEW SUBJECT
                     </a>
                  </li>
               </ul>
            </nav>
         </header>
         <div id="main" class="wrapper style1">
            <div class="container">
               <!-- Form -->
               <section>
                  <h2>SCP Subject Form</h2>
                  <form name="insert" method="POST" action="processing.php">
                     <div class="row gtr-uniform gtr-50">
                        <div class="col-12">
                           <label for="subjectNumber"><strong>Subject</strong></label>
                           <input type="text" name="Item_No" id="subjectNumber" maxlength="10" oninvalid="this.setCustomValidity('Please Enter valid subject')" oninput="setCustomValidity('')" placeholder="Use the following format SCP-###" pattern="[A-Za-z0-9 -]+" required>
                        </div>
                        <div class="col-12">
                           <label for="subjectClassType"><strong>Object Class</strong></label>
                           <input type="text" name="Object_class" id="subjectClassType" maxlength="10" placeholder="Class types: Euclid, Safe, Keter, Thaumiel, Neutralized" oninvalid="this.setCustomValidity('Please Enter valid object class')" oninput="setCustomValidity('')" required>
                        </div>
                        <div class="col-12">
                           <label for="subjectImageLink"><strong>Subject Image Link (if any available)</strong></label>
                           <input type="text" name="Subject_image_path" id="subjectImageLink" placeholder="Use following format: images/image_name.(gif, jpg, png)">
                        </div>
                        <div class="col-12">
                           <label for="subjectProcedures"><strong>Containment Procedures</strong></label>
                           <textarea name="Procedures" rows="6" id="subjectProcedures" placeholder="Separate Containment Procedures Paragraphs with /n" oninvalid="this.setCustomValidity('Please Enter valid procedures')" oninput="setCustomValidity('')" required></textarea>
                        </div>
                        <div class="col-12">
                           <label for="subjectDescription"><strong>Subject Description</strong></label>
                           <textarea name="Description" rows="6" id="subjectDescription" placeholder="Separate Subject Description Paragraphs with /n" oninvalid="this.setCustomValidity('Please Enter valid description')" oninput="setCustomValidity('')" required></textarea>
                        </div>
                        <div class="col-12">
                           <label for="subjectReference"><strong>Reference</strong></label>
                           <textarea name="Reference" rows="6" id="subjectReference" placeholder="Separate Reference Paragraphs with /n"></textarea>
                        </div>
                        <div class="col-12">
                           <label for="subjectAdditional"><strong>Additional Notes</strong></label>
                           <textarea name="Additional_Notes" rows="6" id="subjectAdditional" placeholder="Separate Additional Notes Paragraphs with /n"></textarea>
                        </div>
                        <div class="col-12">
                           <label for="subjectAppendix"><strong>Appendix</strong></label>
                           <textarea name="Appendix" rows="6" id="subjectAppendix" placeholder="Separate Appendix Paragraphs with /n"></textarea>
                        </div>
                        <div class="col-12">
                           <ul class="actions">
                              <li><input type="submit" class="primary" name="submit" value="Submit"></li>
                           </ul>
                        </div>
                     </div>
                  </form>
               </section>
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