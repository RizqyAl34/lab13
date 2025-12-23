<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    
    // Proses Upload Gambar
    $gambar = $_FILES['file_gambar']['name'];
    $tmp = $_FILES['file_gambar']['tmp_name'];
    move_uploaded_file($tmp, "gambar/" . $gambar);

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal Simpan: " . mysqli_error($conn);
    }
}
$title = 'Tambah Barang';
include_once 'header.php';
?>

<div style="display: flex; justify-content: center; padding: 40px; background-color: #375345ff; min-height: 80vh;">
    <div style="width: 100%; max-width: 600px; padding: 30px; background: white; border-radius: 12px; border: 1px solid #f8bbd0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        <h1 style="margin-bottom: 25px; font-size: 30px;">Tambah Barang</h1>
        
        <form method="post" enctype="multipart/form-data">
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Nama Barang</label>
                <input type="text" name="nama" style="flex: 1; padding: 8px; border: 1px solid #0dbe80ff;" required>
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Kategori</label>
                <select name="kategori" style="flex: 1; padding: 8px; border: 1px solid #7dcba2ff;">
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Harga Jual</label>
                <input type="number" name="harga_jual" style="flex: 1; padding: 8px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Harga Beli</label>
                <input type="number" name="harga_beli" style="flex: 1; padding: 8px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">Stok</label>
                <input type="number" name="stok" style="flex: 1; padding: 8px; border: 1px solid #198f46ff;">
            </div>
            <div style="margin-bottom: 25px; display: flex; align-items: center;">
                <label style="width: 150px; font-size: 18px;">File Gambar</label>
                <input type="file" name="file_gambar" style="flex: 1;">
            </div>
            
            <div style="margin-left: 150px;">
                <input type="submit" name="submit" value="Simpan" style="background-color: #428bca; color: white; padding: 10px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            </div>
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>