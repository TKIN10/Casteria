    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Casteria</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
    <div class="main">
        <div class="container-field">
            <div class="form-wrapper">
                <h1>更新画面</h1>
                <form action="/contact/update?id=<?php echo $contactId; ?>" method="post">
                    <div class="form-item">
                        <label for="name">氏名</label>
                        <input type="text" name="name" placeholder="テスト太郎" value="{$post['name']|default:$data->name}">
                        <p class="error-text">{$errorMessages['name']|default:''}</p>
                    </div>

                    <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <input type="text" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:$data->kana}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="tel">電話番号</label>
                        <input type="text" name="tel" placeholder="000-0000-0000" value="{$post['tel']|default:$data->tel}">
                        <p class="error-text">{$errorMessages['tel']|default:''}</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="{$post['email']|default:$data->email}">
                        <p class="error-text">{$errorMessages['email']|default:''}</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="contactform">お問い合せ内容</label>
                        <textarea name="body" id="body" placeholder="お問い合せ" rows="4">{$post['body']|default:$data->body}</textarea>
                        <p class="error-text">{$errorMessages['body']|default:''}</p>
                    </div>

                    <input type="hidden" name="id" value="{$data->id}">

                    <div class="edit-button">
                        <input type="submit" class="button" value="更新">
                        <a href="/contact/contactform" class="button mt-4" onclick="return confirm('本当にキャンセルしますか?')">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>