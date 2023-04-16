<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кнопка</title>
    <link href="/task/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <button id="btn" class="button">Кликни</button>
    <div id="overlay">
           <div class="form-window">
               <img id="close" class="close-icon" src="/task/images/close-icon.png" />
               <h1 class="form-header">Получите набор файлов для руководителя:</h1>
               <div class="row">
                   <div class="col-md-6 mobile-top">
                        <div class="file-formats">
                            <img src="images/doc.png">
                            <img src="images/xls.png">
                            <img src="images/pdf.png">
                            <img src="images/pdf.png">
                            <img src="images/pdf.png">
                            <img src="images/pdf.png">
                            <img src="images/pdf.png">
                        </div>
                        <div class="inner-images">
                            <img src="images/open-book.png">
                            <img src="images/closed-book.png">
                            <img src="images/phone.png">
                        </div>
                   </div>
                   <div class="col-md-6">
                        <h3 class="form-header-mobile">Получите набор файлов для руководителя:</h3>
                        <form id="popup-form" method="post" action="/task/send.php">
                            <label>Введите Email для получения файлов:</label>
                            <input type="text" name="email" placeholder="E-mail">
                            <label>Введите телефон для подтверждения доступа:</label>
                            <input class="phone" type="text" name="phone" placeholder="+7 (000) 000-00-00" required>
                            <button type="submit">Скачать файлы<img class="select-icon" src="/task/images/select.png"></button>
                            <input type="hidden" name="act" value="order">
                            <div class="files-info">
                                <small>PDF 4,7 MB</small>
                                <small>DOC 0,8 MB</small>
                                <small>XLS 1,2 MB</small>
                            </div>
                        </form>
                        <div class="success-message" style="display:none">
                            <p>Форма успешно отправлена!</p>
                          </div>
                   </div>
               </div>
           </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/task/js/modal.js" type="text/javascript"></script>
<script src="/task/js/validate.js" type="text/javascript"></script>
</html>
