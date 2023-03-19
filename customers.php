<html lang="en">
<head>
<div class="cs">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php 
    include 'connect.php';
    include('navbar.html');
    $sql = "SELECT * FROM cust_info";
    $result = mysqli_query($conn,$sql);
?>

        <div class="container">
            <h1>Our Customers</h1>
                <table>
                    <div class="table-header">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Operation</th>
                        </tr>
                    </thead>
                    </div>
                    <div class="table-content">
                    <tbody>
                        <?php 
                            while($rows=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td class="py-2"><?php echo $rows['ID'] ?></td>
                            <td class="py-2"><?php echo $rows['C_NAME']?></td>
                            <td class="py-2"><?php echo $rows['EMAIL']?></td>
                            <td class="py-2"><?php echo $rows['BALANCE']?></td>
                            <td><a href="moneytransfer.php?ID= <?php echo $rows['ID'] ;?>"> 
                            <button type="button" class="btn">Transact</button></a></td> 
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </div>
                </table>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>