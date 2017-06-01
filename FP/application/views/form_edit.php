<html>
<head>
  <title>Data barang</title>
<body>
  <form method="POST" action="<?php echo base_url()."crud/do_update"; ?>">
<table>
    <tr>
        <td>
          kode_barang
        </td>
        <td>
          <input type="text" name="kode_barang" value="<?php echo $kode_barang; ?>" readonly />
        </td>
    </tr>
    <tr>
        <td>
          nama_barang
        </td>
        <td>
          <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" />
        </td>
    </tr>
   
    <tr>
        <td>
          jumlah
        </td>
        <td>
          <input type="text" name="jumlah" value="<?php echo $jumlah; ?>" readonly />
        </td>
    </tr>
     <tr>
        <td>
          Tambahan
        </td>
        <td>
          <input type="text" name="tambah" value="" />
        </td>
    </tr>
    <tr>
        <td>
          harga
        </td>
        <td>
          <input type="text" name="harga" value="<?php echo $harga; ?>"/>
        </td>
    </tr>
   
    <tr>
        <td>
        </td>
        <td>
          <input type="submit" name="btnSubmit" value="Simpan" />
        </td>
    </tr>
</table>
</form>
</body>
</head>
</html>
