<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>

            <th>username</th>
            <th>content</th>
        </tr>
        <?php

            $connection = mysqli_connect("localhost" ,"root" ,"", "facebook");
            $jointype = $_POST['join_type'];

           if ($jointype ==="inner"){

               $query = 'SELECT * FROM user INNER JOIN comment ON user.id= comment.user_id';
           } elseif ($jointype ==="outer"){
            
            $query = 'SELECT * FROM user INNER JOIN comment ON user.id= comment.user_id';
           }

            
           $result= mysqli_query($connection, $query);
        //    if($result)
           while($row= mysqli_fetch_assoc($result)){
            "<tr>";
            "<td>";
             echo $row['username'];
             "</td>";
           "</tr>";

         
        // <?php
             } 
         mysqli_close ($conection);
    ?>
    
    </table>
</body>
</html>