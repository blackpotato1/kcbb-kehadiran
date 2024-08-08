<?php
# Memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk -->
<h3>Login Ahli</h3>

<!-- borang daftar masuk (log in/sign in) -->
<form action='login-proses.php' method='POST'>

    Nokp    <input type='text'  name='nokp' ><br>
    Katalaluan  <input type='password'  name='katalaluan' ><br>
                <input type='submit'    value='Login'>

</form>
<?php include ('footer.php'); ?>