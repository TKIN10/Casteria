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
                <h1>確認画面</h1>
                <form action="/contact/complete" method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-item">
                        <label for="name">氏名</label>
                        <input type="text" name="name" placeholder="テスト太郎" value="{$contact['name']|default:$data->name}" readonly>
                    </div>

                    <div class="form-item">
                        <label for="kana">ふりがな</label>
                        <input type="text" name="kana" placeholder="てすとたろう" value="{$contact['kana']|default:$data->kana}" readonly>
                    </div>

                    <div class="form-item">
                        <label for="email">電話番号</label>
                        <input type="tel" name="tel" placeholder="000-0000-0000" value="{$contact['tel']|default:$data->email}" readonly>
                    </div>

                    <div class="form-item">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="{$contact['email']|default:$data->email}" readonly>
                    </div>

                    <div class="form-item">
                        <label for="contactform">お問い合せ内容</label>
                        <textarea type="body" name="body" placeholder="お問い合せ" rows="4" readonly>{$contact.body|default:$data->body}</textarea>
                    </div>

                    <div class="edit-button">
                        <input type="submit" class="button" value="送信">
                        <a href="/contact/contactform" class="button mt-4">キャンセル</a>
                    </div>
                </form>
                <div>
               <div class="row justify-content-md-center text-center">
                 <div class="col-lg-6 mx-auto col-md-8">
                    <div class="bg-white p-3 rounded mb-5">
                      <div class="m-1">
                        <a href="/">トップページへ</a>
                      </div>
                 </div>
               </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</body>