<?php

$conn = new mysqli("localhost", "root", "","sms_game");
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


else if(isset($_GET['method']) && $_GET['method']=="show")
{
    
   
    $team_id=$_GET['team_id'];
    $sql="select * from game_questions WHERE team_id=".$team_id;
    //echo $sql;
    $rooms=array();
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($rooms, $row);
        }
    }
    echo json_encode($rooms);

}
else if(isset($_GET['method']) && $_GET['method']=="checkinBack")
{
    $x=$_GET['x'];
    $sql="select answer from game_questions where id=".$x;
   
    $rooms=array();
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($rooms, $row);
        }
    }
    echo json_encode($rooms);


}
else if(isset($_GET['method']) && $_GET['method']=="turnStatus")
{
    $x=$_GET['x'];
    $sql="UPDATE game_questions SET status = 1 where id=".$x;
    $result = mysqli_query($conn, $sql);

}  
        
?> 

