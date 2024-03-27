<?php
require './config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>address</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `users` ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <form action="process.php" method="post">
                        <input type="hidden" name="oldId" value='<?php echo $row['id'] ?>'>
                        <td><input type="text" name="id" value='<?php echo $row['id'] ?>' id=""></td>
                        <td><input type="text" name="username" value='<?php echo $row['username'] ?>' id=""></td>
                        <td><input type="email" name="email" value='<?php echo $row['email'] ?>' id=""></td>
                        <td><input type="text" name="address" value='<?php echo $row['address'] ?>' id=""></td>
                        <td><input type="submit" name="updateUser" value="update user"> <a
                                href="process.php?deleteUser=true&id=<?php echo $row['id'] ?>">Delete User</a></td>
                    </form>
                </tr>

                <?php
                    }
                }
                ?>
                <tr>
                    <form action="process.php" method="post">
                        <td></td>
                        <td><input type="text" name="username" id=""></td>
                        <td><input type="email" name="email" id=""></td>
                        <td><input type="text" name="address" id=""></td>
                        <td><input type="submit" name="createUser" value="create user"></td>
                    </form>
                </tr>


            </tbody>
        </table>
    </center>

</body>

</html>