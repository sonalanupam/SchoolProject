<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Add Actor or Director'; ?>
<?php include(SHARED_PATH . '/browse_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/browse/index.php'); ?>">&laquo; Back to Home</a>

  
    <h3>Add new Actor/Director</h3>
            <form method = "GET" action="#">
               <label class="radio-inline">
                    <input type="radio" checked="checked" name="identity" value="Actor"/>
                    Actor
                </label>
                <label class="radio-inline">
                    <input type="radio" name="identity" value="Director"/>Director
                </label>
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" placeholder="Text input"  name="fname"/>
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Text input" name="lname"/>
                </div>
                <label class="radio-inline">
                    <input type="radio" name="sex" checked="checked" value="male">Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex" value="female">Female
                </label>
                <div class="form-group">
                  <label for="DOB">Date of Birth</label>
                  <input type="text" class="form-control" placeholder="Text input" name="dateb">ie: 1997-05-05<br>
                </div>
                <div class="form-group">
                  <label for="DOD">Date of Die</label>
                  <input type="text" class="form-control" placeholder="Text input" name="dated">(leave blank if alive now)<br>
                </div>
                <button type="submit" class="btn btn-default">Add!</button>
            </form>
    
</div>
<?php include(SHARED_PATH . '/browse_footer.php'); ?>
