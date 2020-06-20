
<?php

/**
 * Accounts
 */
class Accounts extends Dbh
{

  private function check($id,$pass){
    $sql = 'SELECT * FROM companies WHERE company_id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;

  }
  public function register($cmp, $email, $pwd, $phone, $site = NULL){
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO companies (company_name,email,phone,website,password)
    VALUES (?,?,?,?,?);
    ';

    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($cmp, $email, $phone, $site, $pwd))){
      return -1;
    }else {
      return 1;
    }
  }

  public function login($e,$p){
    $sql = 'SELECT * FROM companies WHERE email=?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array($e));
    $num = $stmt->rowCount();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($num > 0) {
      $hpwd = $data['password'];
      if (!password_verify($p,$hpwd)) {
        return -1;
      }else{

        if ($data['approved'] != 1) {
          return -2;
        }else{
          return $data;
        }
      }
    }else{
      return 0;
    }
  }

  public function getUserData($id,$email){
    $sql = 'SELECT * FROM companies WHERE id=? AND email=?';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($id,$email))){
      return -1;
    }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;

  } // end of method

  public function updateEmail($id,$em,$pass){
    $user = $this->check($id,$pass);
    if (!password_verify($pass, $user['password'])) {
      return -1;
    }

    $sql = 'UPDATE companies SET email=? WHERE company_id = ?';
    $stmt =$this->connect()->prepare($sql);
    if (!$stmt->execute(array($em,$id))){
      return -2;
    }else{
      return $em;
    }
  } // end of method

  public function updatePass($id, $old, $new){
    $user = $this->check($id,$old);
    if (!password_verify($old, $user['password'])) {
      return -1;
    }

    $pass = password_hash($new, PASSWORD_DEFAULT);
    $sql = 'UPDATE companies SET password=? WHERE company_id = ?';
    $stmt =$this->connect()->prepare($sql);
    if (!$stmt->execute(array($pass,$id))){
      return -2;
    }else{
      return 0;
    }
  }


  public function allAccounts(){
    $sql = 'SELECT * FROM companies ORDER BY approved';

    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($data) {
      return $data;
    }
  }

  public function approve($id){
    $sql = 'UPDATE companies SET approved = 1 WHERE company_id=?';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($id))){
      return -1;
    }
    return 0;
  }
  public function delete($id){
    $sql = 'DELETE FROM companies WHERE company_id=?';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($id))){
      return -1;
    }
    return 0;
  } // end of method

  public function searchAcc($sug){
    $like = "%".$sug."%";
    $sql = 'SELECT * FROM companies WHERE companies.company_name LIKE ?
    ';

    $stmt = $this->connect()->prepare($sql);
    if (!$stmt->execute(array($like))){
      return -1;
    }

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;

  }


}// end of class
