<?php require_once('initialize.php') ?>
<?php include('browse_header.php'); ?>

<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';

if(!empty($search)) 
{

$srchArray = preg_split('/\s+/',$search);
print_r($srchArray);
$cond1='\'%';
$cond2='\'%';
$cnt = count($srchArray);
for($i=0 ; $i < $cnt ; $i++) {
    $cond1 .=$srchArray[$i];
    $cond1 .= '%';
}
for($j=$cnt-1 ; $j>=0 ; $j--) {
    $cond2 .=$srchArray[$j];
    $cond2 .= '%';
}

$cond1 .='\'';
$cond2 .= '\'';

//Get Actor Information
$sql = "SELECT id, concat(first,' ',last) as Name, dob as 'Date of Birth' from Actor ";
$sql .= "WHERE concat(first,' ' ,last) like $cond1 or concat(first,' ' ,last) like $cond2";
echo $sql;
$actor = mysqli_query($db,$sql);
confirm_result_set($actor);

//Get Movie Information

$sql = "SELECT id, title as 'Movie Name', year as Year from Movie ";
$sql .= "WHERE title like $cond1 or title like $cond2";
echo $sql;
$movie = mysqli_query($db,$sql);
confirm_result_set($movie);

}



?>

  
<h3><b> Movies Information Page </b></h3>

<div class="form-horizontal">
            <form class="navbar-form" role="search">
             <div class="form-horizontal">
              <input type="search" name="search" id="search" style="width:300px" placeholder="Search Movies.."/>
              <button class="btn" style="height:28px;width:72px;background-color:#0000A0;color:white" align="middle" >Search </button>
             </div>
            </form>
          </div>


<?php
if(!empty($search)) { 
   // Show Movie Information First

   $error = '';
   $toOutput1 = '<div class=\'table-responsive\'> <table class=\'table table-bordered table-condensed table-hover\'>';
   $showHeader1 = true; 
   while($row1=$movie->fetch_assoc())
   {
      $toOutput1 .= '<tr align=left>';
       // Outputs a header of SQL result
       if($showHeader1)
       {
           $keys1 = array_keys($row1);
           $s = count($keys1);
                                                       
           for($i=1;$i < $s ;$i++)
           {
            $toOutput1 .= '<td><b>'. $keys1[$i] .'</b></td>';
           }
           $toOutput1 .= '</tr><tr align=left>';
           $showHeader1 = false;
           
       }
       //Outputs the row values
       $values1 = array_values($row1);
       for($i=1;$i < count($values1); $i++)   
       {
        $toOutput1 .= '<td width=\'20%\'><b>'.'<a href=' ;
        $toOutput1 .= url_for('MovieDB/Show_Movie.php');
        $toOutput1 .= '?id=' . $values1[0];
        $toOutput1 .= '>';
        $toOutput1 .=  $values1[$i] ;    
        $toOutput1 .= '</a></b></td>';   
                            
       }
       $toOutput1 .= '</tr>' ; 
                    
   }
   $toOutput1 .= '</table> </div>';
   
   echo $toOutput1;
   mysqli_free_result($movie);




   // Show Actor Information Later
    
    $error = '';
    $toOutput = '<table class=\'table table-bordered table-condensed table-hover\'>';
    $showHeader = true; 
    while($row=$actor->fetch_assoc())
    {
       $toOutput .= '<tr align=left>';
        // Outputs a header of SQL result
        if($showHeader)
        {
            $keys = array_keys($row);
            $t = count($keys);
                                                        
            for($i=1;$i < $t ;$i++)
            {
             $toOutput .= '<td><b>'. $keys[$i] .'</b></td>';
            }
            $toOutput .= '</tr><tr align=left>';
            $showHeader = false;
            
        }
        //Outputs the row values
        $values = array_values($row);
        for($i=1;$i < count($values); $i++)   
        {
            $toOutput .= '<td width=\'20%\'><b>'.'<a href=' ;
            $toOutput .= url_for('MovieDB/Show_Actor.php');
            $toOutput .= '?id=' . $values[0];
            $toOutput .= '>';
            $toOutput .=  $values[$i] ;    
            $toOutput .= '</a></b></td>';                   
        }
        $toOutput .= '</tr>' ; 
                     
    }
    $toOutput .= '</table>';
    
    echo $toOutput;
    mysqli_free_result($actor);
}
     ?>
          
         
       

<?php include('browse_footer.php'); ?>




