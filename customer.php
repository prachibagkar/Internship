<?php
    include ('header.php');
?>

<?php 
include ('connection.php');
$query = "SELECT * FROM customer";
$result1 = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spark | Customer Details</title>
    <link rel="stylesheet" href="customer.css">
</head>
<body>
    <section>
        <h1>Customer Details</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Account Number</th>
                <th>Balance (Rs)</th>
                <th>Email Id</th>
                <th>Contact</th>
                <th>Money Transfer</th>
            </tr>
            <?php   
                while($rows=$result1->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['acc_no'];?></td>
                <td><?php echo $rows['balance'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['mobile'];?></td>
                <td><a href="transaction.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> 
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body> 
</html>

