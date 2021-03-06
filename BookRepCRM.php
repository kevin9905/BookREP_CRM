<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">

   <!-- Google fonts used in this theme  -->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>  

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- Customer panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>
            
               <?php
                  $queryId = $_GET['id'];
                  $customer=fopen("customers.txt","r") or die("Unable to open file!");
                  $customerInsert=array("customerID","FirstName","LastName","Email","University","address","City","State","Country","ZIP/Postal","phone");
                  
                  while(!feof($customer)){
                     $customerField=explode(",",iconv("Windows-1252", "UTF-8", fgets($customer)));
                     $customerID=$customerField[0];
                     $firstName=$customerField[1];
                     $lastName=$customerField[2];
                     $name=$firstName." ".$lastName;
                     $email=$customerField[3];
                     $university=$customerField[4];
                     $city=$customerField[6];
                     echo '<tr><td name="Name"><a href="?id='.$customerID.'">' . $name. '</a></td><td name="Email">' . $email . '</td>
                        <td name="University">'.$university.'</td><td name="City">'.$city. 
                        '</td></tr>';
                  }
                  fclose($customer);
               ?>
           </table>
           </div> 
           
               <?php
                  $queryId1 = $_GET['id'];
                  if (isset($_GET['id'])) {
                     $customer=fopen("customers.txt","r") or die("Unable to open file!");
                     while(!feof($customer)){
                        $customerField=explode(",",iconv("Windows-1252", "UTF-8", fgets($customer)));
                        $customerID=$customerField[0];
                        $firstName=$customerField[1];
                        $lastName=$customerField[2];
                        $name=$firstName." ".$lastName;
                        if($queryId1==$customerID){
                           echo ' <div class="panel panel-danger spaceabove"> ';
                           echo '<div class="panel-heading"><h4>Order for '.$name.'</h4></div>';
                           echo '<table class="table">';
                           echo '<tr>';
                           echo '<th>ISBN</th>';
                           echo '<th>Title</th>';
                           echo '<th>Category</th>';
                           echo '</tr>';
                           
                           $order=fopen("orders.txt","r") or die("Unable to open file!");
                            while(!feof($order)){
                              $orderField=explode(",",iconv("Windows-1252", "UTF-8", fgets($order)));
                              $orderCustID=$orderField[1];
                              $isbn=$orderField[2];
                              $title=$orderField[3];
                              $category=$orderField[4];
                              
                              if($customerID==$orderCustID){
                                 echo '<tr>';
                                 echo '<td>'.$isbn .'</td>';
                                 echo '<td>'.$title.'</td>';
                                 echo '<td>'.$category .'</td>';
                                 echo '</tr>';
                                 
                              }
                             

                              }
                               if($customerID==17||$customerID==7||$customerID==22){
                                 echo '<tr><td><h4>No order for that customer</h4></td></tr>';
                              }
                           echo '</table>';
                           echo '</div>';
                          
                        }

                        }
                     }
                  
               ?> 
            
         

               

      </div>


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>