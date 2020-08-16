<?php
session_start();
class profile_information
{
    // Properties
    public $first;
    public $last;
    public $phone;
    public $gender;
    public $birth;
    public $email;
}




$id = $_SESSION['userid'];
$conn = mysqli_connect('localhost','root','','projectt');
$sql = "Select * From user where id=$id";
$result = mysqli_query($conn, $sql);

$first="";
$last="";
while($row = mysqli_fetch_array($result)):
    {$objphp = new  profile_information();


        $objphp->first= $row['FName'];
        $objphp->last= $row['LName'];
        $objphp->phone=$row['phone'];
        $objphp->gender=$row['gender'];
        $objphp->birth=$row['birthday'];
        $objphp->email=$row['email'];
        $myJSON = json_encode($objphp);

        echo $myJSON;

    }
endwhile;

$conn -> close();


?>
