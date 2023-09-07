<?php
/* Smarty version 4.3.2, created on 2023-09-04 05:22:00
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64f569782810f2_50445758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fff580b287f0b0e99dc5cedd40967815a4c01ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl',
      1 => 1693804906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64f569782810f2_50445758 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!DOCTYPE html>
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
                <form action="/contact/update?id=<?php echo '<?php'; ?>
 echo $contactId; <?php echo '?>'; ?>
" method="post">
                    <div class="form-item">
                        <label for="name">氏名</label>
                        <input type="text" name="name" placeholder="テスト太郎" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->name ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>

                    <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <input type="text" name="kana" placeholder="てすとたろう" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->kana ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="tel">電話番号</label>
                        <input type="text" name="tel" placeholder="000-0000-0000" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->tel ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->email ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>
                    
                    <div class="form-item">
                        <label for="contactform">お問い合せ内容</label>
                        <textarea name="body" id="body" placeholder="お問い合せ" rows="4"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data']->value->body ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</textarea>
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>

                    <input type="hidden" name="id" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value->id, ENT_QUOTES, 'UTF-8');?>
">

                    <div class="edit-button">
                        <input type="submit" class="button" value="更新">
                        <a href="/contact/contactform" class="button mt-4" onclick="return confirm('本当にキャンセルしますか?')">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body><?php }
}
