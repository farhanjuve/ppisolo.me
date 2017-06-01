<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
</head>
<body>
	<table border="1" style="border-collapse: collapse; width:50%;">
		<tr style="background: white;">
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>EDIT</th>
			<th>DELETE</th>
            <th>GAMBAR</th>
		</tr>
		<?php foreach($data as $d){ ?>
		<tr>
            <?php 
            $decrypt1 = $d['kode_barang'];
            $decrypt2 = $d['nama_barang'];
            $decrypt3 = $d['jumlah'];
            $decrypt4 = $d['harga'];
            ?> 
			<th><?php echo base64_decode($decrypt1); ?></th>
			<th><?php echo $decript = $this->encryption->decrypt($decrypt2); ?></th>
			<th><?php echo $decript = $this->encryption->decrypt($decrypt3); ?></th>
			<th><?php echo $decript = $this->encryption->decrypt($decrypt4); ?></th>
			<td align="center">
                <a 
                   <?php 
                    $decrypt1 = $d['kode_barang'];
                    $decript = $this->encryption->decrypt($decrypt1); 
                   ?>
                   href="<?php echo base_url()."crud/edit_data/".$d['kode_barang']; ?>"><button>Ganti</button>
                </a>
            </td>
			<td align="center">
                <a 
                   <?php 
                    $decrypt1 = $d['kode_barang'];
                    $decript = $this->encryption->decrypt($decrypt1); 
                   ?>
                   href="<?php echo base_url()."crud/do_delete/".$d['kode_barang']; ?>"><button>Hapus</button>
                </a>
            </td>
            <td>
                <img src="<?php echo base_url().$d['image']; ?>" width="400" height="300">
            </td>
		</tr>
		<?php } ?>
	</table>
    <a href="<?php echo base_url()."crud/add_data"; ?>">Tambah data!</a>
</body>
</html>