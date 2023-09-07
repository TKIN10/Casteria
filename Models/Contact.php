<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

  public function __construct($dbh = null)
  {
      parent::__construct($dbh);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getAllContacts() {
    $query = "SELECT * FROM contacts";
    $stmt = $this->dbh->prepare($query);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
  }

    /**
     * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
     *
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問い合せ内容
     */
    
    public function completeContact(string $name, string $kana, string $tel , string $email, string $body)
    {
        try{
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            $stmt->execute();
            
            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }

    }

    public function getContactData(string $id): ?stdClass
    {
        try {
            $result = null;
    
            if (isset($_GET['id'])) {
                $contactId = $_GET['id'];
            } else {
                echo "IDが指定されていません。";
                exit;
            }
    
            $query = 'SELECT * FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                error_log("SQL クエリの実行エラー: " . implode(" ", $stmt->errorInfo()));
                exit;
            }
            $result = $stmt->fetch(PDO::FETCH_OBJ); 
    
            if ($result === false) {
                return null;
            }
    
            return $result;
        } catch (PDOException $e) {
            error_log("データベースエラー: " . $e->getMessage());
            exit();
        } catch (Exception $e) {
            error_log("エラー: " . $e->getMessage());
            exit();
        }
    }

    /**
     * ユーザーの情報を更新する
     * @param string $id 更新対象のユーザーID
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問合せ内容
     */

     public function updateContact(string $id, string $name, string $kana, string $tel, string $email, string $body): bool
     {
         try {
             $this->dbh->beginTransaction();
             $query = 'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
             error_log("Update query: " . $query);
             $stmt = $this->dbh->prepare($query);
             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
             $stmt->bindParam(':name', $name, PDO::PARAM_STR);
             $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
             $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
             $stmt->bindParam(':email', $email, PDO::PARAM_STR);
             $stmt->bindParam(':body', $body, PDO::PARAM_STR);
             $stmt->execute();
     
             // トランザクションを完了することでデータの書き込みを確定させる
             $this->dbh->commit();
             return true;
         } catch (PDOException $e) {
             // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
             $this->dbh->rollBack();
             echo "更新失敗: " . $e->getMessage() . "\n";
             return false;
         }
     }

     public function deleteContact(string $id) {
        try{
            $this->dbh->beginTransaction();
            $query = 'DELETE FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "削除失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}