<?php 
  if(!isset($page_title)){ $page_title="Browse Area";}
?>

<!doctype html>
<html lang="en">
  <head>
    <title> Movie Database - <?php echo $page_title; ?></title>
    <meta charset="utf-8">
     <link rel="stylesheet" media="all" href="<?php echo url_for('/MovieDB/movie.css'); ?>" />
     <link rel="stylesheet" media="all" href="<?php echo url_for('/MovieDB/bootstrap.css'); ?>" />
     <link rel="stylesheet" media="all" href="<?php echo url_for('/MovieDB/bootstrap.min.css'); ?>" />
  </head>
  <body>
     
      <ul>
      <li><a href=<?php echo url_for('MovieDB/index.php');?>>Movie Database Homepage </a> </li>
         <li class="my_dropdown">
          <a href="javascript:void(0)" class="my_dropbtn">  Browse</a>
            <div class="my_dropdown-content">
               <a href= <?php echo url_for('MovieDB/Show_Movie.php');?>>Show Movies Information</a>
               <a href="#">Show Actor Information</a>
           </div>
         </li> 

         <li class="my_dropdown">
          <a href="javascript:void(0)" class="my_dropbtn">Add Content</a>
            <div class="my_dropdown-content">
               <a href="#">Add Actor/Director</a>
               <a href="#">Add Movie Information</a>
               <a href="#">Add Movie Actor Relation</a>
               <a href="#">Add Movie Director Relation</a>
           </div>
         </li> 

         <li>
        <div class="form-horizontal">
        <form class="navbar-form" role="search">
        <div class="form-horizontal">
           <input type="search" name="search" id="search" style="width:300px" placeholder="Search Movies or Actors"/>
          <button class="btn" style="height:28px;width:72px;background-color:#0000A0;color:white" align="middle" >Search </button>
        </div>
        </form>
        </div>
        </li>
     
     
        </ul>
    </div>


  

          