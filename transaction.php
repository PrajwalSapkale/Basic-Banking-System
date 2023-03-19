<?php
include 'connect.php';
include('navbar.html');

if (isset($_POST['submit'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['AMOUNT'];

    $selectQueryFrom = "SELECT * from cust_info where ID=$from";
    $query = mysqli_query($conn, $selectQueryFrom);
    $result1 = mysqli_fetch_array($query);

    $selectQueryTo = "SELECT * from cust_info where ID=$to";
    $query = mysqli_query($conn, $selectQueryTo);
    $result2 = mysqli_fetch_array($query);

    if ($from == $to) {
        echo '<h4 onclick="myFunction()">Sender & Receiver cannot be the same person.</h4>';
        echo '<script>';
        echo 'function myFunction(){
            window.location="transaction.php";}';
        echo '</script>';
    }

    //TO check if the entered amount is negative
    else if (($amount) < 0) {
        echo '<h4 onclick="myFunction()">Negative amount cannot be transferred.</h4>';
        echo '<script>';
        echo 'function myFunction(){
            window.location="transaction.php";}';
        echo '</script>';
    }

    //Constraint to check insufficient balance.
    else if ($amount > $result1['BALANCE']) {
        echo '<h4 onclick="myFunction()">Insufficient amount in your balance.</h4>';
        echo '<script>';
        echo 'function myFunction(){
            window.location="transaction.php";}';
        echo '</script>';
    }

    //Constraint to check zero values
    else if ($amount == 0) {
        echo '<h4 onclick="myFunction()">Zero amount cannot be transferred.</h4>';
        echo '<script>';
        echo 'function myFunction(){
            window.location="transaction.php";}';
        echo '</script>';
    } 
    
    else {
        $newbalance = $result1['BALANCE'] - $amount;
        $updateSenderQuery = "UPDATE cust_info set BALANCE=$newbalance where ID=$from";
        mysqli_query($conn, $updateSenderQuery);

        $newbalance = $result2['BALANCE'] + $amount; 
        $updateReceiverQuery = "UPDATE cust_info set BALANCE=$newbalance where ID=$to";
        mysqli_query($conn, $updateReceiverQuery);

        // Insert in transaction history table
        $sender = $result1['C_NAME'];
        $receiver = $result2['C_NAME'];
        $insertQuery = "INSERT INTO transaction(SENDER, RECEIVER, AMOUNT) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $insertQuery);

        if ($query) {
            echo '<script>';
            echo 'window.location="successmessage.php";';
            echo '</script>';
        } 

        else {
            echo '<h4 onclick="myFunction()">An Error has occured during transaction.</h4>';
            echo '<script>';
            echo 'function myFunction(){
                window.location="transaction.php";}';
            echo '</script>';
        }
    }
}
?>

<html>
    <div class="container">
    <link rel="stylesheet" href="style.css">
        <h1>Transaction</h1><br><br><br><br><br><br>
        <form method="post" name="tcredit" class="tabletext" >
        <label>Transfer from :</label>
        <select name="from" class="form-control" required>
            <option value="" disabled selected>Select Sender</option>
            <?php
                include 'connect.php';
                $sql = "SELECT * FROM  cust_info";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >
                    <?php echo $rows['C_NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
        <label>Transfer To :</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Select Receiver</option>
            <?php
                include 'connect.php';
                $sid=$_POST['from'];
                $sql = "SELECT * FROM  cust_info";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >
                    <?php echo $rows['C_NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount :</label>
            <input type="number" class="form-control" name="AMOUNT" required>   
            <br><br>
            <div class="text-center" >
            <button class="btn1" name="submit" type="submit" id="showAlert" on-click="btn">TRANSFER</button>
            </div>
        </form>
    </div>
</html>

