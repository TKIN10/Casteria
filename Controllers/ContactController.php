<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH.'Models/Contact.php';

class ContactController extends Controller{

    public function contactform() {
        session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); 

        $error = $_SESSION['errorMessages'] ?? null;
        unset($_SESSION['errorMessages']);
        
        if(empty($_SESSION['contact'])){
            $contact = null;
        }else{
            $contact = $_SESSION['contact'];
        }

        $contacts = $this->getAllContacts();
        $this->view('contact/contactform', ['contacts' => $contacts ,'post' => $contact, 'errorMessages' => $error]);
    }

    private function getAllContacts() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 送信されたトークンとセッション内のトークンを比較
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                // トークンが一致しない場合、リクエストを拒否またはエラーを返す
                die('CSRF攻撃の可能性があります。');
            }
            // トークンが一致した場合、フォームデータの処理を続行
            // データのバリデーションやデータベースへの保存などを行う
        }
        $contact = new Contact();
        return $contact->getAllContacts();
    }

    public function confirmation(){
        session_start();
        $errorMessages = [];

        if(empty($_POST['name'])){
            $errorMessages['name'] = '氏名を入力してください。';
        }

        if(empty($_POST['kana'])){
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }

        if(empty($_POST['tel'])){
            $errorMessages['tel'] = '電話番号を数字で入力してください。';
        }

        if(empty($_POST['email'])){
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }

        if(empty($_POST['body'])){
            $errorMessages['body'] = 'お問い合せ内容を入力してください';
        }

        $_SESSION['contact'] = [
            'name' => $_POST['name'],
            'kana' => $_POST['kana'],
            'tel' => $_POST['tel'],
            'email' => $_POST['email'],
            'body' => $_POST['body']
        ];

        if(!empty($errorMessages)){
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            header('Location: /contact/contactform');
        }else{
            //登録処理
            $this->view('contact/confirmation', ['contact' => $_SESSION['contact']]);
        }
    }

    public function complete(){
        session_start();
        $errorMessages = [];

        $userId = $_SESSION['auth'] ?? false;
        if($userId === false){
            header('Location: /');
            exit;
        }

        $contactformdata = $_SESSION['contact'];
        $contact = new Contact;

        $contactId = $contact->completeContact (
            $contactformdata['name'],
            $contactformdata['kana'],
            $contactformdata['tel'],
            $contactformdata['email'],
            $contactformdata['body'],
        );
        if (isset($contactId)) {
             unset($_SESSION['contact']);
             $this->view('contact/complete');
        } else {
             $errorMessages = '入力内容に誤りがあります。';
             $this->view('contact/contactform', ['post' => $_POST, 'errorMessages' => $errorMessages]);
        }
    }

    public function edit(){
        $contactId = $_GET['id'];
        $contact = new Contact;
        $result = $contact->getContactData($contactId);
        $this->view('contact/edit', ['data' => $result]);
    }

    public function getAuth(){
        session_start();
        return $_SESSION['auth'] ?? false;
    }

    public function update(){

        $errorMessages = [];
        
        $id = $_POST['id']; 
        error_log("ID: " . $id);

        if (empty($id)) {
            echo "IDが指定されていません。";
            exit;
        }
        
        $contact = new Contact;
        $data = $contact->getContactData($id);

        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        }

        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }

        if (empty($_POST['tel'])) {
            $errorMessages['tel'] = '電話番号を入力してください。';
        }

        if (empty($_POST['body'])) {
            $errorMessages['body'] = 'お問合せ内容を入力してください。';
        }

        if (!empty($errorMessages)) {
            // バリデーション失敗
            $this->view('contact/edit', ['post' => $_POST, 'errorMessages' => $errorMessages]);
        } else {
            // 更新処理
            $result = $contact->updateContact(
                $id,
                $_POST['name'],
                $_POST['kana'],
                $_POST['tel'],
                $_POST['email'],
                $_POST['body']
            );

            if ($result === true) {
                header('Location: /contact/contactform');
                exit;
            } else {
                $this->view('contact/edit', ['post' => $_POST, 'errorMessages' => $errorMessages, 'auth' => $id]);
            }
        }
    }



    public function delete() {
        session_start();
        
        if (!isset($_GET['id'])) {
            header('Location: /contact/contactform');
            exit;
        }
        $contactId = $_GET['id'];
        $contact = new Contact;
        $contact->deleteContact($contactId);
        header('Location: /contact/contactform');
        exit;
    }
}