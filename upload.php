<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resim Upload Sistemi</title>
    <!-- Css Dosyaları -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link href="assets/images/favicon.ico" rel="icon" type="image/x-icon"/>
</head>
<body>

<?php

require 'class.upload.php';

if ( isset( $_POST[ 'uploadF' ] ) ) {

    $handle = new Upload($_FILES['image']);

    if ($handle->uploaded) {

        /* Resmi Yeniden Adlandır */
        $handle->file_new_name_body = 'galeri_'.substr(base64_encode(uniqid(true)), 0, 5);

        /* Resmi Yeniden Boyutlandır */
        //$handle->image_resize = true;
        //$handle->image_x = 150;
        //$handle->image_ratio_y = true;

        /* Resim Yükleme İzni */
        $handle->allowed = array('image/*');

        // resmin üzerine yazı yazmak için kullanılır.
        //$handle->image_text = 'Bayrak Sepeti';
        $handle->image_text_direction = 'v'; // Dikey mi Yatay mı  v - Dikey h - Yatay
        $handle->image_text_color = '#fa6534';

        // Watermark Verme
        $handle->image_watermark = "resim/watermark.png";

        /* Resmi İşle */
        $handle->Process("resim/");
?>

        <!-- Başlık ve Yazı Alanı -->
        <h2>Resim Upload Sistemi</h2>
        <p class="lead" style="color:green">Tebrikler ,
            <b>Başarılı Bir Şekilde Resim Yüklediniz</b>
        </p>
        <!--#Başlık ve Yazı Alanı -->

        <!-- Upload Alanı -->
        <div id="file-upload-form" class="uploader">
            <label for="file-upload" id="file-drag">

                <!-- Önizleme Resmi -->
                <img id="file-image"
                     src="<?php echo $handle->file_dst_path . $handle->file_dst_name; ?>"
                     alt="Preview" class="">
                <!--#Önizleme Resmi -->

                <!-- Resim Bilgi Alanı -->
                <div id="response" class="">
                    <div id="messages"></div>
                    <progress class="progress" id="file-progress" value="0"><span>100</span>%</progress>
                    <table cellpadding="5" cellspacing="5">
                        <tr>
                            <td style="font-weight: bold;">Resim Linki ;</td>
                        </tr>
                        <tr>
                            <td>
                                <a style="color:blue;text-decoration: none;font-weight:bold" target="_blank" href="<?php echo 'http://localhost/upload/resim/'.$handle->file_dst_name.'' ?>"><?php echo 'http://localhost/upload/resim/'.$handle->file_dst_name.'' ?></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--#Resim Bilgi Alanı -->

            </label>
        </div>
        <!--#Upload Alanı -->

<?php
    // Yüklenenemişse Verilecek Hata
    }else{
        echo '<!-- Başlık ve Yazı Alanı -->
        <h2>Resim Upload Sistemi</h2>
        <p class="lead" style="color:red">Hata ,
            <b>Resim Uzantısını Kontrol Edip Tekrar Deneyiniz</b>
        </p>
        <!--#Başlık ve Yazı Alanı -->';
    }
}else{
    // Post Edilmeden Gelinmişse
    header('Location:index.php');
}
?>

    <!-- Script Dosyaları -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="assets/js/index.js"></script>

</body>
</html>