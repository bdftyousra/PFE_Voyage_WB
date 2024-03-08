<?php
include_once 'UsersManager.php';
include_once 'trait.php';

// Get form data
$UserName = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$Email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$birthday = isset($_POST['birthday']) ? htmlspecialchars($_POST['birthday']) : '';
$Password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
$PasswordConf = isset($_POST['passwordconf']) ? htmlspecialchars($_POST['passwordconf']) : '';
$checked = isset($_POST['isChecked']) && $_POST['isChecked'] === 'on';

// Call the method to register the user
$result = UsersManager::Inscrire($UserName, $Email, $birthday, $Password, $PasswordConf);

// Display result
if ($result !== "account was created with success!") {
    echo("<h6 style='color:red;font-size:12pt' align='center'>$result</h6>");
} else {
    echo("<h6 style='color:green;font-size:12pt' align='center'>$result</h6>");
    
    // Add email for advertising if checkbox is checked
    if ($checked) {
        $result = Tvg::addemailspublicitaire($Email, $UserName);
    }
    ?>
    <script>
        setTimeout(function(){
            $('#log').click();
            document.getElementById('use').value="<?=$UserName; ?>";
        }, 1000);
    </script>
    <?php
}
?>
