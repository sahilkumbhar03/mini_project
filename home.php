<html>
<a  href="login_form.php"><button>Logout</button></a>
</html>
<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "admin";
    $dbname = "mini_project";

    $conn = new mysqli($servername, $username, $password, $dbname);
    error_reporting(0);
?>
<html>
<head>
    <link rel="stylesheet" href="../assignmentphp/main.css">

<body id="display1">
<div class="header1">



<?php
        session_start();
        $email=$_SESSION['email'];
        $pass=$_SESSION['pass'];

        $sql_header="SELECT * FROM registration where email='$email'and pass='$pass'";
        $data=mysqli_query($conn,$sql_header);
        $resultA=mysqli_fetch_assoc($data);
        $fname=$resultA['fname'];
        $lname=$resultA['lname'];


       
        echo "<div class='header3'><img src='".$resultA['photo']."' height='100' width='100'</td></div>";
        echo "<div class='header2'><h2>Welcome</h2><p>$fname&nbsp;$lname</p></div>";
        
    ?>

</div>
<?php
    $sql1="SELECT * FROM registration";
    $data=mysqli_query($conn,$sql1);
    $count=mysqli_num_rows($data);
?>

<h2 id="details1">Details of Registered users:</h2>
<table>
    <tr>
        <th>FirstName</th>
        <th>LastName</th>
        <th>EmailID</th>
        <th>ContactNumber</th>
        <th>Age</th>
        <th>Image</th>
    </tr>

    <?php
        while($result1=mysqli_fetch_assoc($data)){
            echo "<tr>
                    <td >".$result1['fname']."</td>
                    <td>".$result1['lname']."</td>
                    <td >".$result1['email']."</td>
                    <td>".$result1['contact']."</td>
                    <td >".$result1['Age']."</td>
                    <td ><img src='".$result1['photo']."' height='100' width='100'</td>
                </tr>";
        }
    
    ?>
   
</table>

</body>
</html>