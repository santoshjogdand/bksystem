<?php
require 'connect.php';
$ok = 0;
if (isset($_POST["submit"])) {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST["amt"];
        $paycust = $_POST["payee"];
        $benfcust = $_POST["benf"];
        $payeeid = $_POST["payeeid"];
        $benfid = $_POST["benfid"];
        if ($paycust != "null" and $benfcust != "null" and $amount != "0") {
            if ($paycust != $benfcust) {
                $transfer1 = "UPDATE customers SET current_bal = current_bal - $amount WHERE name = '$paycust' and id = '$payeeid'";
                mysqli_query($conn, $transfer1);
                $transfer2 = "UPDATE customers SET current_bal = current_bal + $amount WHERE name = '$benfcust' and id = '$benfid'";
                mysqli_query($conn, $transfer2);
                $insert_query = "INSERT INTO transfers(id_payee, payee_name, id_benficiary, benf_name,amt) VALUES ($payeeid, '$paycust', $benfid, '$benfcust',$amount)";
                mysqli_query($conn, $insert_query);
                require 'success.php';
                $ok = 1;
            } else {
                echo '<script>alert("Payee And Benficiary cant be same")</script>';
            }
        } else {
            echo '<script type="text/javascript">
             window.onload = function () { alert("All fields are mandatory!!"); } 
                </script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="/style/transfer.css">
    
</head>

<body class="">

    <?php include("../comp/header.php"); ?>


    <div class="form-c flex justify-center text-[#735DA5] items-center mt-10 ">
        <form
            class=" text-xl font-[#735DA5] border-[2px] border-[#735DA5] rounded-tr-3xl shadow-[5px_5px_0px_0px] shadow-[#735DA5] p-10 "
            action="./transfer.php" method="post">
            <div class='mb-2'>
                <h2 class="text-3xl text-start font-semibold">Send Money</h2>
                <?php
                    if ($ok) {
                        echo $_SESSION["success"];
                        session_unset();
                    }
                    ?>
            </div>
            <div class="payee">
                <label class="text-base font-bold" for="payee">Payee Info: </label>
                <br>
                <label for="benf" class="text-base">Enter Id: </label>
                <br>
                <input
                    class="amt mt-[1.5px] text-base rounded-md w-[18rem] px-3 py-1 border-[1px] outline-none border-[#735DA5] "
                    name="payeeid" required type="number">
                <br>
                <label for="benf" class="text-base">Enter Name: </label>
                <br>
                <input
                    class="amt mt-[1.5px] text-base rounded-md w-[18rem] px-3 py-1 border-[1px] outline-none border-[#735DA5] "
                    name="payee" required type="text">
            </div>
            <div class="benfi mt-2  mb-2">
                <label for="benf" class="text-base font-bold">Benficiary Info: </label>
                <br>
                <label for="benf" class="text-base">Enter Id: </label>
                <br>
                <input
                    class="amt mt-[1.5px] text-base rounded-md w-[18rem] px-3 py-1 border-[1px] outline-none border-[#735DA5] "
                    name="benfid" required type="number">
                <br>
                <label for="benf" class="text-base">Enter Name: </label>

                <br>
                <input
                    class="amt mt-[1.5px] text-base rounded-md w-[18rem] px-3 py-1 border-[1px] outline-none border-[#735DA5] "
                    name="benf" required type="text">
            </div>
            <label for="amt" class="text-base">Amount to Transfer: </label>
            <br>
            <input
                class="amt mt-[1.5px] text-base rounded-md w-[18rem] px-3 py-1 border-[1px] outline-none border-[#735DA5] "
                name="amt" required type="number">
            <br>
            <input type="submit" name="submit"
                class="mt-2 text-base hoe p-1 shadow-[5px_5px_0px_0px] shadow-[#735DA5] rounded-tr-md hover:bg-[#ff6aa3] border-[#735DA5] border-2  bg-[#EA4C89] w-full text-white"
                value="Transfer">
        </form>

    </div>
</body>

</html>