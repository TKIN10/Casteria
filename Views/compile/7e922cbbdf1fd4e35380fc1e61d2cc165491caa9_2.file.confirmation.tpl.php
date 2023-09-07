<?php
/* Smarty version 4.3.2, created on 2023-09-05 06:38:39
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64f6ccef9a11b7_08984215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e922cbbdf1fd4e35380fc1e61d2cc165491caa9' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl',
      1 => 1693895917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64f6ccef9a11b7_08984215 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                        <input type="text" name="name" placeholder="テスト太郎" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['name'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->name ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    </div>

                    <div class="form-item">
                        <label for="kana">ふりがな</label>
                        <input type="text" name="kana" placeholder="てすとたろう" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['kana'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->kana ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    </div>

                    <div class="form-item">
                        <label for="email">電話番号</label>
                        <input type="tel" name="tel" placeholder="000-0000-0000" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['tel'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->email ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    </div>

                    <div class="form-item">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['email'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->email ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    </div>

                    <div class="form-item">
                        <label for="contactform">お問い合せ内容</label>
                        <textarea type="body" name="body" placeholder="お問い合せ" rows="4"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['body'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->body ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</textarea>
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
</body><?php }
}
