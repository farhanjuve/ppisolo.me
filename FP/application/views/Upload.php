<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Hai, <?php echo $this->session->userdata("nama"); ?></title>
<link href="<?php echo base_url("assets/css/mainupload.css")?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url("assets/js/scriptupload.js") ?>"> </script>
<script> var url = "<?php echo base_url(); ?>"; </script>
</head>
<body>
    <header>
    <!--<img src="<?php echo base_url("assets/img/logo.png")?>" width="70vh" height="70vh" href="<?php echo base_url()?>">-->
    <h2>Upload Data Sekolah <a href="<?php echo base_url()?>">Home</a></h2>
    </header>
    
    <div class="container">
    <div class="contr"><h2>Hai, <?php echo $this->session->userdata("nama"); ?>! Tolong upload file yang dibutuhkan</h2></div>
    <div class="upload_form_cont">
        <form id="upload_form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'crud/do_upload' ?>" > 
            <div>
                <div>
                    <label for="image_file">Anda bisa download dahulu file yang kami berikan, lalu anda bisa isikan hal-hal yang diperlukan didalamnya, kemudian upload kembali file yang sudah anda isi tersebut di sini</label>
                </div>
                <div>
                    <input type="file" name="image_file" id="image_file" onchange="fileSelected();" />
                </div>
            </div>
        
            <div>
                <a href="<?php echo base_url().'crud/do_download' ?>"> Download File </a>
            </div>
            
            <div>
                <!--<input type="button" value="Upload File" href ="<?php echo base_url().'crud/do_upload' ?>" />-->
                <input type = "submit" name = "upload" value="Simpan!" />
            </div>
        
            <div id="fileinfo">
                <div id="filename"></div>
                <div id="filesize"></div>
                <div id="filetype"></div>
                <div id="filedim"></div>
            </div>
        
            <div id="error">Pastikan File yang kamu upload benar ya!</div>
            <div id="error2">An error occurred while uploading the file</div>        
            <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>        
            <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>        
            <div id="progress_info">
                <div id="progress"></div>
                <div id="progress_percent">&nbsp;</div>
                <div class="clear_both"></div>
                <div>
                    <div id="speed">&nbsp;</div>
                    <div id="remaining">&nbsp;</div>
                    <div id="b_transfered">&nbsp;</div>
                    <div class="clear_both"></div>
                </div>
                <div id="upload_response"></div>
            </div>
        </form>
    <img id="preview" />
    </div>
    </div>
    <div>
        <a href="<?php echo base_url('crud/keluar')?>"> Logout</a>
    </div>
</body>
</html>
