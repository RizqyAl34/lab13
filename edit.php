<?php
include_once 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id = '{$id}'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $sql_update = "UPDATE data_barang SET nama='{$nama}' WHERE id='{$id}'";
    if (mysqli_query($conn, $sql_update)) {
        header('location: index.php');
        exit;
    }
}
$title = 'Edit Barang';
include_once 'header.php';
?>

<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="width: 100%; max-width: 500px; padding: 30px; background: white; border-radius: 12px; border: 1px solid #f8bbd0; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h1 style="margin-bottom: 25px; font-size: 30px;">Edit Barang</h1>
        <form method="post">
            <div style="margin-bottom: 20px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Nama Barang</label>
                <input type="text" name="nama" value="<?php echo $data['nama']; ?>" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-left: 150px;">
                <input type="submit" name="submit" value="Update" style="background-color: #428bca; color: white; padding: 10px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                <a href="index.php" style="margin-left: 10px; color: #428bca; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>