<html>
    <link href="/styles.css" rel="stylesheet">
    <script type="text/javascript" src="/script.js"></script>
    <head>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-row">
                <img class="logo" src="/img/logo.png">
            </div>
            <img class="main" src="/img/main.png">
        </div>
        <form id="my-form">
            <div class="inputs">
                <div class="column-1">
                    <div class="form-and-label">
                        <div class="label">Имя<span class="star">*</star></div>
                        <input type="text" class="text-input form-input" name="name" placeholder="">
                    </div>
                    <div class="form-and-label">
                        <div class="label">E-mail<span class="star">*</star></div>
                        <input type="text" class="text-input form-input" name="email" placeholder="">
                    </div>
                </div>
                <div class="column-2">
                    <div class="label">
                        Комментарий <span class="star">*</star>
                    </div>
                    <textarea name="comment" class="text-input"></textarea>
                </div>
            </div>
            <input type="button" class="btn-send" value="Записать">
        </form>
        <div class="comments">
            <div class="title">
            Выводим комментарии
                </div>
                <div class="content">
                    <div class="card">
                        <div class="name">
                            Вася
                        </div>
                        <div class="email">
                            email@mail.ru
                        </div>
                        <div class="comment">
                            Комментарий от Васи Пупкина
                        </div>
                     </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-row">
                    <img class="logo" src="/img/logo.png">
                    <div class="socials">
                        <img class="vk" src="/img/vk.png">
                        <img class="facebook" src="/img/facebook.png">
                    </div>
                </div>
            </div>
    </div>
</body>
</html>