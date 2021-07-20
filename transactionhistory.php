<?php
    include ('header.php');
?>

<?php 
include ('connection.php');
$query = "SELECT * FROM `transaction`";
$result1 = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spark | Transaction History</title>
    <link rel="stylesheet" href="transactionhistory.css">
</head>
<body>
    <section>
        <h1>Transaction Details</h1>
        <table>
            <tr>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Transfer Amount (Rs)</th>
                <th>Date & Time</th>
            </tr>
            <?php   
                while($rows=$result1->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['sender'];?></td>
                <td><?php echo $rows['receiver'];?></td>
                <td><?php echo $rows['balance'];?></td>
                <td><?php echo $rows['datetime'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>