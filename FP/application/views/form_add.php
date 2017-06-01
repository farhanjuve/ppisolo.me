<html>
<head>
  <title>Tambah barang</title>
</head>
    <body>
        <form method="POST" action="<?php echo base_url()."crud/do_insert"; ?> " enctype="multipart/form-data">
            <table>
        <tr>
            <input type="hidden" name="size" value="100000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="Say Something!">
					
				</textarea>
			</div>
        </tr>
        <tr>
            <td>
                Kode Barang
            </td>
            <td>
                <input type = "text" name = "kode_barang" />
            </td>
        </tr>
        <tr>
            <td>
                Nama Barang
            </td>
            <td>
                <input type = "text" name = "nama_barang" />
            </td>
        </tr>
        <tr>
            <td>
                Jumlah Barang
            </td>
            <td>
                <input type = "text" name = "jumlah" />
            </td>
        </tr>
        <tr>
            <td>
                Harga Barang
            </td>
            <td>
                <input type = "text" name = "harga" />
            </td>
            <td>
                <input type = "submit" name = "upload" value="Simpan!" />
            </td>
        </tr>
    </table>
		</form>
    </body>
</html>
