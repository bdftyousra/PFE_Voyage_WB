<?php
include_once 'DataAccess.php';
class UsersManager{
 public static function checkExixstance($UserName, $Email)
    {
        $r = 0;

        $req = "select * from users where UserName='$UserName'";
        $curseur1 = DataAccess::selection($req);
        $nbr = $curseur1->rowCount();
        if ($nbr != 0) {
            $r = $r + 1;
        }

        $req = "select * from users where Email='$Email'";
        $curseur1 = DataAccess::selection($req);
        $nbr = $curseur1->rowCount();
        if ($nbr != 0) {
            $r = $r + 2;
        }

        return $r;
    }

    public static function Inscrire($UserName, $Email, $birthday, $Password, $PasswordConf)
{
    $r = self::checkExixstance($UserName, $Email);
    $arr = explode("-", $birthday);
    $birthyear = (int)$arr[0];  // Convert to integer
    $curryear = date("Y");
    $r1 = "";

    if ($r != 0) {
        if ($r == 1) {
            $r1 = "UserName is already used!";
        }
        if ($r == 2) {
            $r1 = "Email is already used!";
        }
        if ($r == 3) {
            $r1 = "This account already exists, just login!";
        }
    } else {
        if ($Password != $PasswordConf) {
            $r1 = "The two passwords must be equal!";
        }
        if ($curryear - $birthyear < 18) {
            $r1 = "Your age must be more than 18 years old.";
        }
        if ($Password == $PasswordConf && $curryear - $birthyear >= 18) {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $req = "insert into users(UserName, Email, Pass, datenaissance) values ('$UserName', '$Email', '$hashedPassword', '$birthday')";
            $nbr = DataAccess::miseajour($req);
            $r1 = "Account was created with success!";
        }
    }

    return $r1;
}


    public static function Login($UserName,$Password){
        $r=0;
        $req="select * from users where UserName='$UserName' ";
        $curseur1= DataAccess::selection($req);
        $nbr=$curseur1->rowCount();
        if($nbr==0){
            $r=$r+1;
        }
        $req="select * from users where Pass='$Password' and UserName='$UserName' ";
        $curseur1= DataAccess::selection($req);
        $nbr=$curseur1->rowCount();
        if($nbr==0){
            $r=$r+2;
        }
        return $r;
    }

    public static function getProfilePictureByUserName($UserName){
        $req="select Profilepic from users where UserName='$UserName' ";
        $curseur1= DataAccess::selection($req);
        $r="";
        while($row=$curseur1->fetch()){
            $r=$row[0];
        }
        $curseur1->closeCursor();
        return $r;
    }

    public static function getEmailByUserName($user){
        $req="select Email from users where UserName='$user' ";
        $curs=DataAccess::selection($req);
        $r="";
        while($row=$curs->fetch()){
            $r=$row[0];
        }
        $curs->closeCursor();
        return $r;
    }
    public static function getPasswordByUserName($user){
        $req="select Pass from users where UserName='$user' ";
        $curs=DataAccess::selection($req);
        $r="";
        while($row=$curs->fetch()){
            $r=$row[0];
        }
        $curs->closeCursor();
        return $r;
    }
    public static function getPassByUserName($user){
        $req="select Pass from users where UserName='$user' ";
        $curs=DataAccess::selection($req);
        $r="";
        while($row=$curs->fetch()){
            $r=$row[0];
        }
        $curs->closeCursor();
        return $r;
    }

    public static function Modifier($olduser,$newuser,$pass,$newemail,$oldemail,$photo){
        $nbr=0;
        $r1=0;
        $r2=0;
        if($olduser!=$newuser){
            $curseur1= DataAccess::selection("select * from users where UserName='$newuser' ");
            if($curseur1->rowCount()!=0){
                $r1=1;
            }
        }
        if($oldemail!=$newemail){
            $curseur1= DataAccess::selection("select * from users where Email='$newemail' ");
            if($curseur1->rowCount()!=0){
                $r2=1;
            }
        }
        if($r1==0 && $r2==0){
            $req="update users set UserName='$newuser',Email='$newemail',Pass='$pass',Profilepic='$photo' where UserName='$olduser' ";
            $nbr= DataAccess::miseajour($req);
        }
        return $nbr;

       
    }

}
?>