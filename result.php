<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="users.css" rel="stylesheet">

</head>

<body>



    <h1>Welcome</h1>

    <div>

        <h3>
            <a href="add_productform.html">Add Products</a><br>
        </h3>





        <form action="update.php" method="POST" name="edit" enctype="multipart/form-data">
            <?php

            $c = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($c, 'task');

            $sql = "select * from products order by product_name ASC";
            $result = mysqli_query($c, $sql);
            ?>
            <table border="1px">
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                </tr>



                <?php
                while ($row = mysqli_fetch_array($result)) {


                ?>
                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['pprice']; ?></>


                    </tr>


        </form>


                



    <?php
                }
    ?>
    </table>
    </form>
    </div>
</body>

</html>