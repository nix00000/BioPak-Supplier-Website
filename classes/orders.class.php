<?php

/**
 * Orders
 */
class Orders extends Dbh
{
  public function order($acc,$pck,$qty,$loc,$em,$ph){
    $date = date("Y-m-d");
    $sql = 'INSERT INTO orders (company_id,pack_id,units,del_loc,phone,email,ord_date)
    VALUES (?,?,?,?,?,?,?)';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($acc,$pck,$qty,$loc,$ph,$em,$date))){
      return -1;
    }else{
      return 0;
    }
  }//End of method

  public function orderDetails($id){
    $sql = 'SELECT order_id company_id,orders.pack_id,pack_name,price,units,del_loc,phone,email,ord_date,sent
    FROM Orders
    INNER JOIN packs ON orders.pack_id = packs.pack_id
    WHERE company_id = ?
    ORDER BY ord_date DESC';

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array($id));
    $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }//End of method

  public function exists($id, $pck){
    $sql='SELECT * FROM orders WHERE company_id=? AND pack_id=?';
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt->execute(array($id, $pck))){
      return -2;
    }
    if ($stmt->rowCount() > 0){
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data;
    }else{
      return -1;
    }

  } //End of method

  public function updateOrder($id, $pck, $qty, $loc, $ph, $em){
    $date = date("Y-m-d");
    $sql = 'UPDATE orders SET units = ?, del_loc=?,ord_date =?, phone=?, email=?
    WHERE company_id=? AND pack_id=?';

    $stmt= $this->connect()->prepare($sql);
    if(!$stmt->execute(array($qty,$loc,$date,$ph,$em,$id,$pck))){
      return -1;
    }
    return 0;

  } // End of method


  public function allOrders(){
    $sql = 'SELECT pack_name,price,order_id,orders.phone,companies.email,units,sent,ord_date,company_name,admin
    FROM orders
    INNER JOIN companies
    ON orders.company_id = companies.company_id
    INNER JOIN packs
    ON orders.pack_id = packs.pack_id
    WHERE sent = 0
    ORDER BY ord_date ASC
    ';
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) {
      return -1;
    }

    return $data;
  } // End of method

  public function send($id){
    $sql = 'UPDATE orders SET sent = 1 WHERE order_id = ?';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($id))){
      return -1;
    }
    return $id;
  }
  public function cancel($id){
    $sql = 'DELETE FROM orders WHERE order_id=?';
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute(array($id))){
      return -1;
    }
    return 0;
  }

  public function searchOrd ($sug){
    $like = "%".$sug."%";
    $sql = 'SELECT pack_name,price,order_id,orders.phone,companies.email,units,sent,ord_date,company_name,admin
    FROM orders
    INNER JOIN companies
    ON orders.company_id = companies.company_id
    INNER JOIN packs
    ON orders.pack_id = packs.pack_id
    WHERE company_name LIKE ?
    ';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array($like));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) {
      return -1;
    }

    return $data;

  }



}//End of class
