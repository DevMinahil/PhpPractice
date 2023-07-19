
<?php



include('../../Config/connection.php');
require_once('./userFactory.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $is_admin = isset($_POST['isAdminCheckbox']) ? 1 : 0;

}

$stmt = $user->getUserByEmail($email);
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {

    header('Location:../../../Frontend/Views/signup.html?signUpError=1');
    exit();
}

$stmt->close();
$stmt=$user->getUserByPhone($phone);
$result = $stmt->get_result();
if (mysqli_num_rows($result) > 0) {
    header('Location: ../../../Frontend/Views/signup.html?signUpError=2');
    exit();
}
//Insert the signup data into the database
$stmt = $user->create($username, $email, $phone, $password, intval($is_admin));
if ($stmt->affected_rows > 0) {
    echo "Signup successful!";
    $successMessage = "Signup successful!";
    //adding session add of the user
    $stmt=$user->getUserByEmail($email);
    $result=$stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['id'];

    }
    if (intval($is_admin) == 1) {
        $_SESSION['IsAdmin']=1;

        $url = "../../../frontend/views/Admin/adminDashboard.php?successMessage=" . urlencode($successMessage);

    } else {
        $url = "../../../frontend/views/User/userDashboard.php?successMessage=" . urlencode($successMessage);

    }
    header("Location: " . $url);

} else {
    echo "Sign up error";
}
