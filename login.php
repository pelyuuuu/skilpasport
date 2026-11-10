<!DOCTYPE html>
<html>
    <head>
        <title>Login Admin</title>
</head>
<body>
    <header>Silahkan Masukan Username,Password, dan Nomor Telepon Anda<header>
        <form action="login.php" method="POST">
            <fieldset> 
                <p>
                    <label for ="username">username:</label>
                    <input type = "text" name="username" placeholder="Masukan Username Anda">
</p>
<p>
    <label for ="password">password:</label>
                    <input type = "text" name="password" placeholder="Masukan Password Anda">
</p>
<p>
       <label for ="nomor telepon">nomor telepon:</label>
                    <input type = "text" name="nomor telepon" placeholder="Masukan Nomor Telepon Anda">
    <button type ="submit" >LOGIN</button>
</p>
</fieldset>
</form>

 <?php
 $error ="";
  if(isset($_GET['error'])){
        $error = $_GET['error'];
    }

    $pesan ="";
    
    if($error =='login'){
        $pesan = 'Username Dan Password Salah.';
    }

    else if($error == 'invalid'){
        $pesan = "Username dan Password Harus diisi.";
    }

    if($pesan !=''){
        echo $pesan;
    }
    ?>
    </body>
    </html>
