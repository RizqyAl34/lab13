<?php
session_start();
if (isset($_POST['submit'])) {
    // Validasi sederhana
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
        $_SESSION['login'] = true;
        header('location: index.php');
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
$title = 'Login';
include_once 'header.php';
?>

<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    
    <div style="width: 100%; max-width: 400px; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border: 1px solid #73b69fff;">
        
        <h1 style="color: #000; margin-bottom: 20px; font-size: 28px;">User Login</h1>
        
        <?php if(isset($error)): ?>
            <p style="color: red; margin-bottom: 15px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post">
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 100px; font-size: 18px;">Username</label>
                <input type="text" name="username" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="admin">
            </div>
            
            <div style="margin-bottom: 20px; display: flex; align-items: center;">
                <label style="width: 100px; font-size: 18px;">Password</label>
                <input type="password" name="password" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="admin123">
            </div>
            
            <div style="margin-left: 100px;">
                <input type="submit" name="submit" value="Login" class="btn" style="background-color: #428bca; color: white; padding: 10px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            </div>
        </form>
        
        <p style="margin-top: 20px; text-align: center;">
            <a href="index.php" style="color: #4291caff; text-decoration: none;">&larr; Kembali ke Home</a>
        </p>
    </div>
</div>

<?php include_once 'footer.php'; ?>