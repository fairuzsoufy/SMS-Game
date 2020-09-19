<?php
$conn = new mysqli("localhost", "root", "","sms_game");
$sql = "SELECT * FROM game_questions";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html class="no-js" lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.banner {
 display: table;
 width: 100%;
}
 
.hero {
 display: table-cell;
 vertical-align: middle;
 height: 100%;
 margin: 0 auto;
}
 
.container {
 width: 1170px;
 margin: 0 auto;
}
</style>
<body>


<div class=”banner”>
 <div class=”hero”>
 <div class=”container”>
 <h1>Big Title</h1>
 <h2>Sub Title</h2>
 </div>
 </div>
</div>

    <label class="col-form-label" style="font-size:20px;color:white;" >Team color<span class="text-danger">*</label>

                    <div id="first" style="width:80%; margin:auto; padding-left: 80px;">
                        <div class="form-group" >
                        <label class="col-form-label" style="font-size:20px;color:white;" >Team color<span class="text-danger">*</label>
                        <select class="form-control" name="team_id" id="team_id"  required>
                        <option value="1">Red</option>
                        <option value="2">Green</option>
                        <option value="3">Blue</option>
                        <option value="4">Yellow</option>
                        </select>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" onclick="showTable()">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
              
                   
                    <div class="second" style="text-align: center; margin: auto;">
                        <table id="rooms">
                    </table>
                    

                    </div>
                    </div>
                

  
</body>

</html>