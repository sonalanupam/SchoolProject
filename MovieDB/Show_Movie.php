<?php require_once('initialize.php') ?>
<?php include('browse_header.php'); ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '2';

//Get Movie Information
$sql = "SELECT * from Movie ";
$sql .= "WHERE id= '". $id ."'";
$result = mysqli_query($db,$sql);
confirm_result_set($result);
$movie = mysqli_fetch_assoc($result);
mysqli_free_result($result);
echo $sql;

//Get Movie Genre information

$sql = "SELECT * from MovieGenre ";
$sql .= "WHERE mid= '". $id ."'";
$result = mysqli_query($db,$sql);
confirm_result_set($result);
$genre = mysqli_fetch_assoc($result);
mysqli_free_result($result);
echo $sql;

// Get Movie Review informaiton

$sql = "SELECT * from Review ";
$sql .= "WHERE mid= '". $id ."'";
$result = mysqli_query($db,$sql);
confirm_result_set($result);
$review = mysqli_fetch_assoc($result);
mysqli_free_result($result);

// Get Director Information
$sql = "SELECT * from Director D, MovieDirector M ";
$sql .= "WHERE D.id=M.did and M.mid= '". $id ."'";
$result = mysqli_query($db,$sql);
confirm_result_set($result);
$director = mysqli_fetch_assoc($result);
mysqli_free_result($result);

//Get Actor Information

$sql = "SELECT * from Actor A, MovieActor M ";
$sql .= "WHERE A.id=M.aid and M.mid= '". $id ."'";
$result = mysqli_query($db,$sql);
confirm_result_set($result);
$actors = mysqli_fetch_assoc($result);
mysqli_free_result($result);

?>

  <div id="framecontent">
    <div class="innertube">
      <ul>
      <li> Browse Movie Information </li>
      <li><a href=<?php echo url_for('MovieDB/Show_Actor.php');?>>Show Actor Information</a> </li>
      <li><a href=<?php echo url_for('MovieDB/Show_Movie.php');?>>Show Movie Information</a> </li>
      </ul>
    </div>
    </div>

<div id="maincontent">
<div class="innertube">

<h3><b> Movies Information Page </b></h3>
<?php
if(isset($_GET['id'])) { ?>
 
   <div>
    
      <hr>
     <h4><b> Movie Information is:</b></h4>
    Title : <?php echo h($movie['title']);?> <br>
    MPAA Rating : <?php echo h($review['rating']);?> <br>
    Director :<?php echo h($director['first']);?><br>
    Genre :<?php echo h($genre['genre']); ?> <br>

    
      <h4><b> 
        Actors in this Movie:</b></h4><div class='table-responsive'>
      <table class='table table-bordered table-condensed table-hover'>
      <thead>
      <tr><td>Name</td><td>Role</td></thead></tr>
      <tbody><tr><td><a href=" Show_A.php?identifier=18118 ">Erika Eleniak</td><td>"Sara"</td></tr>
       <tr><td><a href=" Show_A.php?identifier=66849 ">Paul Winfield</td><td>"Detective Grady"</td></tr>
       <tr><td><a href=" Show_A.php?identifier=9900 ">Colleen Camp</td><td>"Cynthia"</td></tr>
       </tbody>
       </table>
   </div>
   
   <hr> <h4><b>User Review :</b></h4><a href=" GiveReview.php?MovieID=3618">By now, nobody ever rates this movie. Be the first one to give a review<br>            <hr>
            <label for="search_input">Search:</label>
            <form class="form-group" action="search.php" method ="GET" id="usrform">
              <input type="text" id="search_input"class="form-control" placeholder="Search..." name="result"><br>
              <input type="submit" value="Click Me!" class="btn btn-default" style="margin-bottom:10px">
          </form>
     <?php } ?>
    
         
     <?php { ?>

          <div class="form-horizontal">
            <form class="navbar-form" role="search" action='search.php'>
             <div class="form-horizontal">
              <input type="search" name="search" id="search" style="width:300px" placeholder="Search Movies.."/>
              <button class="btn" style="height:28px;width:72px;background-color:#0000A0;color:white" align="middle" >Search </button>
             </div>
            </form>
          </div>
        
        
        <?php } ?>
      
     
        </div>

         </div>
     

<?php include('browse_footer.php'); ?>




