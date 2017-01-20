<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resim Upload Sistemi</title>
    <!-- Css Dosyaları -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link href="assets/images/favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>

<!-- Başlık ve Yazı Alanı -->
<h2>Resim Upload Sistemi</h2>
<p class="lead">Sadece
    <b>Resim Uzantıları Kabul Edilir</b>
</p>
<!--#Başlık ve Yazı Alanı -->

<!-- Upload Alanı -->
<form id="file-upload-form" action="upload.php" method="post" class="uploader" enctype="multipart/form-data">
    <input id="file-upload" type="file" name="image" accept="image/*"/>
    <label for="file-upload" id="file-drag">
        <!-- Önizleme Resmi -->
        <img id="file-image" src="#" alt="Preview" class="hidden">
        <!--#Önizleme Resmi -->
        <div id="start">
            <i class="fa fa-download" aria-hidden="true"></i>
            <div>Sürükle Bırak</div>
            <div id="notimage" class="hidden" style="color:red;font-weight:bold">* Geçerli Resim Uzantısı Değil , Yükleme Yapılmaz</div>
            <span id="file-upload-btn" class="btn btn-primary">Lütfen Resmi Seçiniz</span>
        </div>
        <!-- Resim Önizleme Alanı -->
        <div id="response" class="hidden">
            <div id="messages"></div>
            <progress class="progress" id="file-progress" value="0"> <span>100</span>%  </progress>
        </div>
        <!--#Resim Önizleme Alanı -->
    </label>
    <div>
        <button type="submit" value="0" name="uploadF" class="send">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Resmi Uplaod Et
        </button>
    </div>
</form>
<!--#Upload Alanı -->

    <!-- Script Dosyaları -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="assets/js/index.js"></script>

</body>
</html>
