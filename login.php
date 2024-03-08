<?php
include_once 'UsersManager.php';

// Validate user input
$user = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : "";
$id = isset($_POST['id']) ? $_POST['id'] : "";

// Perform login
$r = UsersManager::Login($user, $password);

// Check the result and take appropriate actions
if ($r == 0) {
    // Start a session and store user credentials if login is successful
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $password;

    // Set cookies if "Remember Me" is checked
    if ($remember == 1) {
        setcookie("user", $user, time() + 120);
        setcookie("password", $password, time() + 120);
    }

    // Redirect to the appropriate page based on the presence of $id
    $redirectPage = !empty($id) ? "reservation.php" : "index.php";
    ?>
    <script>window.location = "<?php echo $redirectPage; ?>";</script>
    <?php
} elseif ($r == 1) {
    echo("<h6 style='color:red;font-size:12pt' align='center'>Veuillez vérifier votre nom.</h6>");
} elseif ($r == 2) {
    echo("<h6 style='color:red;font-size:12pt' align='center'>Veuillez vérifier votre mot de passe.</h6>");
    echo("<h6 style='color:blue;font-size:12pt;cursor:pointer' align='center' id='recuperer'>Récupérer le mot de passe !</h6>");
} elseif ($r == 3) {
    echo("<h6 style='color:red;font-size:12pt' align='center'>Ce compte n'existe pas.</h6>");
}
?>

<script>
    $('#recuperer').click(function () {
        $(this).html("<h6 style='font-size:12pt' align='center'>Veuillez patienter...</h6>");
        $.ajax({
            type: "POST",
            url: "recuperer.php",
            data: 'username=' + '<?=$user?>'
        }).done(function (res) {
            $('#recuperer').html(res);
        });
    });
</script>
