<html>
    <head>
    <div class="tnhy">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include "connect.php";
            include('navbar.html');
            $sql = "SELECT * from TRANSACTION";
            $result = $conn->query($sql);
        ?>

        <h1>Transaction History</h1>
        <table>
        <div class="table-header">
            <tr>
                <th class="text-center">Sr. No</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </div>

        <div class="table-content">
            <tbody>
            <?php 
            while($rows=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td class="py-2"><?php echo $rows['SR_NO'] ?></td>
                <td class="py-2"><?php echo $rows['SENDER']?></td>
                <td class="py-2"><?php echo $rows['RECEIVER']?></td>
                <td class="py-2"><?php echo $rows['AMOUNT']?></td>
                <td class="py-2"><?php echo $rows['DATETIME']?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
            </div>
    </table>
    </body>
    </div>
</html>


