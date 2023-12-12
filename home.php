<?php
use Phppot\Member;
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="user-registration.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content">Welcome 
            <table border='1'>
                <tr>
                    <th>Name</th>
                    <th>age</th>
                    <th>Phone number</th>

</tr>

            <?php 
            // require_once './lib/DataSource.php';
            //calling the function that return conn
            // $conection = __construct();
            $conection = mysqli_connect("localhost" ,"root" ,"", "facebook");

            $query = 'SELECT * FROM user';
            $result = mysqli_query($conection, $query);
            //display the data on the webpage
            if ($result->num_rows > 0){
                
            //  if ($result){
                while($row= mysqli_fetch_assoc($result)){
                    // echo 'username:' . 
                    // $row["username"] . " <br>";
                    ?>
                        <tr>
                            <td><?php echo $row['username']?></td>
                            <td><?php 
                            // if($row['age'] == null){
                            //     echo 'Null';
                            // }else{
                            //     echo $row['age'];
                            // } ?></td>
                            <td><?php 
                            if($row['telephon'] == null){
                                echo 'Null';
                            }else{
                                echo $row['telephon'];
                            }
                            ?></td>

                    </tr>
                    <?php
                } 
                }else {
                    echo 'no user';
                }
                mysqli_close ($conection);
            //  echo $username;
            ?>
            </table></div>
	</div>
</BODY>
</HTML>
