<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>	
<head>
<title>PPI Surakarta | Daftar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Cofrestru Registration Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="<?php echo base_url("assets/css/styledaftar.css")?>" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,800,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
	<h1>Daftar Menjadi Anggota Online PPI Surakarta</h1>
		<div class="registration">
			<h2>Form Registrasi</h2>				
					<form method="POST" action="<?php echo base_url()."crud/do_daftar"; ?> " enctype="multipart/form-data">
						<div class="form-info">
						<input type="text" name = "fullnamedaftar" class="text" value="Nama Lengkap" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama Lengkap';}" >
                        <input type="text" name = "asalsekolahdaftar" class="text" value="Asal Sekolah" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Sekolah';}" >
						<input type="text" name ="emaildaftar" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
						<input type="text" name ="usernamedaftar" class="text" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" >
						<input type="password" name ="passworddaftar" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
					    </div>
					    <input type="submit" name = "daftarupload" value="DAFTAR">
					</form>
							<div class="clear"> </div>
		</div>
<div class="copy-rights">
			</div>

</body>
</html>