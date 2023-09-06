<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">お問い合わせ</h2>
            <form action="/contact/confirmation" method="post" class="bg-white p-3 rounded mb-5">
                <p class="error-text">{$errorMessages['auth']|default:''}</p>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$post['name']|default:''|escape}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:''|escape}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="text">電話番号</label>
                    <input type="text" class="form-control" name="tel" placeholder="000-0000-0000" value="{$post['tel']|default:''|escape}">
                    <p class="error-text">{$errorMessages['tel']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="exemple@cin-group.co.jp" value="{$post['email']|default:''|escape}">
                    <p class="error-text">{$errorMessages['email']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="contact">お問合せ内容</label>
                    <textarea type="contact" class="form-control" name="body" placeholder="お問合せ内容">{$post['body']|default:''|escape}</textarea>
                    <p class="error-text">{$errorMessages['body']|default:''}</p>
                </div>

                <div class="button-group">
                    <button class="btn bg-warning my-2">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table border="1">
    <thead>
        <tr>
            <th>氏名</th>
            <th>ふりがな</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>お問い合わせ内容</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        {foreach $contacts as $contact}
        <tr>
            <td>{$contact.name|escape}</td>
            <td>{$contact.kana|escape}</td>
            <td>{$contact.tel|escape}</td>
            <td>{$contact.email|escape}</td>
            <td>{$contact.body|escape}</td>
            <td><a href="/contact/edit?id={$contact.id}" class="button">編集</a></td>
            <td><a href="/contact/delete?id={$contact.id}" class="button mt-4" onclick="return confirm('本当に削除しますか?')">削除</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
{include file="layout/footer.tpl"}
</body>