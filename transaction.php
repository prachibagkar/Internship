<?php
    include ('header.php');
?>

<?php
    include ('connection.php');
    if(isset($_POST['submit']))
    {
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from customer where id=$from";
        $query = mysqli_query($connect,$sql);
        $sql1 = mysqli_fetch_array($query); 

        $sql = "SELECT * from customer where id=$to";
        $query = mysqli_query($connect,$sql);
        if (!$query) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        $sql2 = mysqli_fetch_array($query);

        if (($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Please Entered the Valid Amount")';  
            echo '</script>';
        }
        else if($amount > $sql1['balance']) 
        {
            
            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance")';  
            echo '</script>';
        }
        else if($amount == 0)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Zero value cannot be transferred')";
            echo "</script>";
        }
        else 
        {
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE customer set balance=$newbalance where id=$from";
            mysqli_query($connect,$sql);
            
            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE customer set balance=$newbalance where id=$to";
            mysqli_query($connect,$sql);
                    
            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO `transaction`(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($connect,$sql);

            if($query)
            {
                echo "<script> alert('Transaction Successful');
                </script>";
            }

            $newbalance= 0;
            $amount =0;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark | Money Transaction</title>
    <link rel="stylesheet" href="transaction.css">
</head>
<body>
    <?php
        include 'connection.php';
        $sid=$_GET['id'];
        $sql = "SELECT * FROM  customer where id=$sid";
        $result=mysqli_query($connect,$sql);
        if(!$result)
        {
            echo "Error : ".$sql."<br>".mysqli_error($connect);
        }
        $rows=mysqli_fetch_assoc($result);
    ?>
        <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <h3>Money Transfer</h3>
        <h4>To</h4>
        <select class="tobox" name="to">
        <option value="">--Select--</option>
        <?php
            include 'connection.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM customer where id!=$sid";
            $result=mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Error ".$sql."<br>".mysqli_error($connect);
            }
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
        <option class="table" value="<?php echo $rows['id'];?>" >
            <?php echo $rows['name'] ;?> 
            (Balance: <?php echo $rows['balance'] ;?> ) 
        </option>
        <?php 
            } 
        ?>
        </select>
        <h2>Enter Amount</h2>
        <input type="number" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary " name="submit" id="myBtn">Transfer</button> 
        </form>
</body>
</html>
