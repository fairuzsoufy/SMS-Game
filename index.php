<?php
$conn = new mysqli("localhost", "root", "","sms_game");
$sql = "SELECT * FROM game_questions";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
    <meta charset="utf-8">
    <title>SMS Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<style>
#submit:hover { color: black; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">   </script>   


    <script>

        function showTable(id)
        { 
            if ( document.getElementsByName('team_id')[0].value == 'Choose Color' )
            {
                alert('Choose a team first to play!');
                return false;
            }
            else
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
                    url: "backend.php",
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
                            var $tr= '<div style="width:400px; margin:0 auto; text-align:center;" id='+"name"+item.id+'>'+'<tr>'+
                            '<label class="col-form-label" style="font-size:20px;color:white;" >Enter your gussed word<span class="text-danger"></label>'+
                            '<td><input style="border-radius:9px; height: 50px; width:250px; font-size:30px; text-align:center; border-color:black;" type="text" id='+item.id+'></td>'+
                            '<td> <div class="submit-btn-area"><button style="margin-left:15px; margin-top:10px;width:170px; background-color:mediumseagreen;" id='+item.id+' onclick="checkinBack('+item.id+')">Check</button></div></td>'+
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
                url: "backend.php",
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
                        alert("Congrats, Your answer is correct!!");
                        hidee("name"+$id);
                        //turn status to 1
                        jQuery.ajax
                        ({
                            url: "backend.php",
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
                        alert("Ops! Try harder.");
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
        <div class="login-area login-s2">
            <div class="container" style='text-align:center;'>
                <div class="login-box ptb--100" style="background-image: url('background.jpg');   background-size: 550px 650px;
                    background-repeat: no-repeat; background-position: center;">

                    <div id="first" style="width:100%; margin:auto; ">
                        
                        <div class="form-group" >
                            <label class="col-form-label" style="font-size:20px;color:white;" >Choose Your Team Color<span class="text-danger">*</label>
                            <select class="form-control" style="width:300px; margin:0 auto;" name="team_id" id="team_id">
                                <option selected disabled> Choose Color </option>
                                <option value="1">Red</option>
                                <option value="2">Green</option>
                                <option value="3">Blue</option>
                                <option value="4">Yellow</option>
                            </select>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" style="width:170px; color:black; background-color:mediumseagreen;" type="submit" onclick="showTable()">Submit <i class="ti-arrow-right"></i></button>
                        </div>

                    </div>
                
                    <div class="second" style="text-align: center; margin: auto;">
                        <table id="rooms">
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

    </body>

</html>