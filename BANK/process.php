<?php
    include 'conn.php';
      $sender=$_POST['sender'];
      $reciever=$_POST['reciever'];
      $amount=$_POST['amount'];
      


    $query="SELECT balance FROM balance
    WHERE id = $sender";
    $sql=mysqli_query($con,$query);
    $balsen = mysqli_fetch_array($sql);

    $query="SELECT balance FROM balance
    WHERE id = $reciever";
    $sql=mysqli_query($con,$query);
    $balrec = mysqli_fetch_array($sql);

    if($balsen['balance'] < $amount){
        echo ("<script LANGUAGE='JavaScript'> window.alert('Balance low');
        window.location.href='customers.php';
        </script>");
    } 
    elseif($amount<=0){
        echo ("<script LANGUAGE='JavaScript'> window.alert('Cannot transfer 0');
        window.location.href='customers.php';
        </script>");
    }
    else{
        
        $upsen=$balsen['balance']-$amount;
        $uprec=$balrec['balance']+$amount; 
        
        $query="UPDATE balance
        SET balance=$upsen
        WHERE id=$sender";
        mysqli_query($con,$query);

        $query="UPDATE balance
        SET balance=$uprec
        WHERE id=$reciever";
        mysqli_query($con,$query);

        echo ("<script LANGUAGE='JavaScript'> window.alert('Transfer complete');
        window.location.href='customers.php';
        </script>");

        
    }
?>