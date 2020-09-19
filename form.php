<?php
$conn = new mysqli("localhost", "root", "","sms_game");
$sql = "SELECT * FROM game_questions";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SMS Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">   </script>   


<script>

    function showTable(id)
    { 
        var x = document.getElementById("first");
        if (x.style.display === "none") 
        {
       		x.style.display = "block";
    	} 
    	else 
    	{
	        x.style.display = "none";
	    }
        var team_id = document.getElementById("team_id").value;
        jQuery.ajax
        ({
            url: "game.php",
            data: 'method=show&team_id='+team_id,
            type: "GET",
            cache: false,
            processData: false, 
            contentType: false,
            success:function(data1)
            {
                var data = JSON.parse(data1);
                $.each(data, function(i, item) 
                {
                    var $tr= '<div style="width:400px; margin:0 auto;" id='+"name"+item.id+'>'+'<tr>'+
                    '<td><input style="border-radius:9px; height: 50px; width:250px; font-size:30px; text-align:center; border-color:black;" type="text" id='+item.id+'></td>'+
                    '<td> <div class="submit-btn-area"><button style="margin-left:15px; margin-top:10px;width:100px;" id='+item.id+' onclick="checkinBack('+item.id+')">Check</button></div></td>'+
                    '</tr></div>';

                                            

                    $('#rooms').append($tr);
                    
                });
                
            }
            ,error: function(jqXHR, textStatus, errorThrown)
            {
                alert("Upload Failed!");
                        
            }          
        });
    }

    function hidee($id)
    {
        $("#"+$id).hide();
    }
    function checkinBack($id)
    {
        var x = document.getElementById($id).value.toLowerCase();
        jQuery.ajax
        ({
            url: "game.php",
            data: 'method=checkinBack&x='+$id,
            type: "GET",
            cache: false,
            processData: false, 
            contentType: false,
            success:function(data1)
            {
                var data = JSON.parse(data1);
                
                if(data[0]['answer']==x)
                {
                    alert("Your answer is correct");
                    hidee("name"+$id);
                    //turn status to 1
                    jQuery.ajax
                    ({
                        url: "game.php",
                        data: 'method=turnStatus&x='+$id,
                        type: "GET",
                        cache: false,
                        processData: false, 
                        contentType: false,
                        success:function(data1)
                        {
                    
                            
                        }
                        ,error: function(jqXHR, textStatus, errorThrown)
                        {
                            alert("Error, contact IT comittiee");
                                    
                        }          
                    });   
                }
                else
                {
                    alert("Your answer is not correct");
                }
        
                
            }
            ,error: function(jqXHR, textStatus, errorThrown)
            {
                alert("Error, contact IT comittiee");
                        
            }          
        });

    }
</script>


<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container" >
            <div class="login-box ptb--100" style="background-image: url('web.jpg');   background-size: 550px 650px;
  background-repeat: no-repeat;
background-position: center;">

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
        </div>
        
    </div>
    
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>