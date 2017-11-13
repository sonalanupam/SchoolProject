<html>
<head> 
<title> CS143 Project B </title>
</head>
<body>
<h1> Project B - PHP-MySQL</h1>
<form method="get" action="<?=$_SERVER['PHP_SELF']?>"
<label>  
   Type an SQL Query in the following box <br><br>
   Example : SELECT * FROM Actor where id=10; 
 </label>
<br><br>
<textarea name="query" rows="10" cols="60" > <?=isset($_GET['query']) ? htmlspecialchars($_GET["query"]): ''?></textarea>
<br>
<input type="submit" value = "Submit" ><br><br>
</form>
</body>
</html> 


<?php
   // echo $_SERVER['PHP_SELF'];
  // print_r($_SERVER);
  $result ='';
  $error = '';
  $toOutput = '<table border=1 cellspacing=1 cellpadding=2>';
  $showHeader = true; 
  //set_error_handler("customError");
  
    if($_GET) {
       $expression = $_GET['query'];
            
       if($expression)
      {
        $db = new mysqli('localhost','cs143', '','CS143');
        if($db->connect_errno > 0)
        {
            $error = die('Unable to connect to database['. $db->connect_error . ']');
            echo $error;
        } 
        elseif(!($rs = $db->query($expression)))
           {
               $error = $db->error;
               print "Query Failed: $error <br />";
               exit(1);

           }
        else {
           if($rs === TRUE){echo "Query Executed Successfully"; }                   
            
          while($row=$rs->fetch_assoc())
                {
                   $toOutput .= '<tr align=center>';
                    // Outputs a header of SQL result
                    if($showHeader)
                    {
                        $keys = array_keys($row);
                        $t = count($keys);
                                                                    
                        for($i=0;$i < $t ;$i++)
                        {
                         $toOutput .= '<td><b>'. $keys[$i] .'</b></td>';
                        }
                        $toOutput .= '</tr><tr align=center>';
                        $showHeader = false;
                        
                    }
                    //Outputs the row values
                    $values = array_values($row);
                    for($i=0;$i < count($values); $i++)   
                    {
                        $toOutput .= '<td>' . $values[$i] . '</td>';                        
                    }
                    $toOutput .= '</tr>' ; 
                                 
                }
                $toOutput .= '</table>';
                              
                print 'Total records found: ' .$rs->num_rows;
                echo "<br> <br>";
                echo $toOutput;
                $rs->free();
                $db->close();
            }
        }
              

   }

   ?>
   

   