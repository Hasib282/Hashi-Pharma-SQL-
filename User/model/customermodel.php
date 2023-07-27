<?php  

require_once 'db_connection.php';

///////////////////////////////////////////////////////////////////////////////////

//customer part start here

//Check if email already exist
function checkEmail($email){
    $conn = db_conn();
    $sql = "SELECT * from customer where Email = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}

//Check if username already exist
function checkUsername($username){
    $conn = db_conn();
    $sql = "SELECT * from customer where Username = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}


//Add customer / Registration customer to database
function addCustomer($data){
	$conn = db_conn();
    $sql = "INSERT into customer (Username, Name, Email, Phone, Gender, Address, Password, ProfilePic) 
    VALUES (:Username, :Name, :Email, :Phone, :Gender, :Address, :Password, :ProfilePic)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
        	':Username'  => $data['uname'],
        	':Name'      => $data['name'],
        	':Email'     => $data['email'],
        	':Phone'     => $data['phone'],
        	':Gender'    => $data['gender'],
        	':Address'   => $data['address'],
        	':Password'  => $data['pass'],
        	':ProfilePic' => $data['profile']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//login check
function Login($data){
    $conn = db_conn();
    $sql="SELECT * from customer where (Username = :uname OR Email = :email)  AND Password = :pass";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':uname' => $data['id'],
            ':email' => $data['id'],
            ':pass' => $data['pass']
        ]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}

//Show all customer
function showCustomer(){
	$conn = db_conn();
    $sql = 'SELECT * FROM customer ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//for show profile details
function selectid($info){
    $conn = db_conn();
    $sql = "SELECT * FROM customer where (Username = :Username or Email = :Email)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Username'  => $info,
            ':Email'     => $info
        ]);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } 
}

//Update customer
function updateCustomerProfile($id, $data){
    $conn = db_conn();
    $sql = "UPDATE customer set Name = :Name, Phone = :Phone, Gender = :Gender, Address = :Address where ID = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
         ':Name' => $data['name'], 
         ':Phone' => $data['phone'], 
         ':Gender' => $data['gender'], 
         ':Address' => $data['address'], 
         ':Id' => $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function updateCustomerPass($id, $data){
    $conn = db_conn();
    $sql = "UPDATE CUSTOMER set pass = :Pass where Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Pass' => $data['Password'],
            ':Id' => $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateCustomerProfilepic($id, $data){
    $conn = db_conn();
    $sql = "UPDATE CUSTOMER set ProfilePic = :profile where Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':profile' => $data['profile'], 
            ':Id' =>$id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


//Show admin details by id
function showCustomerById($id){
	$conn = db_conn();
	$sql = "SELECT * FROM customer where ID = :Id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([ ':Id' => $id]);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}






//customer part end

////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////

//product part start


//Show all product
function showProduct(){
    $conn = db_conn();
    $sql = 'SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
    return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}



function showProductById($id){
    $conn = db_conn();
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID AND product.product_ID = '$id' ";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}


function showProductByCategory($id){
    $conn = db_conn();
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID AND CATEGORY.CATEGORY_ID = '$id' ";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}


//Update Admin
function updateProductStock($id, $data){
    $conn = db_conn();
    $sql = "UPDATE product set stock = stock - :stock where PRODUCT_ID = :ID";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([ 
         ':stock' => $data['quantity'], 
         ':ID' => $id
        ]);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showMedicine(){
    $conn = db_conn();
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID AND (CATEGORY.CATEGORY_ID <5 or CATEGORY.CATEGORY_ID >8)";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}


//Search product
function searchProduct($search){
    $conn = db_conn();
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE (PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID) AND (Product_name LIKE upper('%$search%') or CATEGORY_name like upper('%$search%') or Manufacturer_name like upper('%$search%')) ";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }   
}

//product part end

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//cart part start


function showCart(){
    $conn = db_conn();
    $sql = 'SELECT * from cart';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
    return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}



//Add Cart
function addCart($data){
    $conn = db_conn();
    $sql = "INSERT into cart (ID, Product_Id, Quantity, AddDate ) 
    VALUES (:Cid,  :Pid, :Quantity, SYSDATE())";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Cid'      => $data['cid'],
            ':Pid'     => $data['pid'],
            ':Quantity'   => $data['quantity']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//show cart by customer id
function showCartbycId($cid){
    $conn = db_conn();
    $sql = 'SELECT * from cart where Id = :cid';
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':cid' => $cid,
        ]);
        $row = $stmt->fetchAll();
        return $row;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}






//check cart existance
function showCartbyId($pid,$cid){
    $conn = db_conn();
    $sql = 'SELECT * from cart where Id = :cid and Product_Id = :pid';
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':cid' => $cid,
            ':pid' => $pid
        ]);
        $row = $stmt->fetch();
        return $row;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}


function updateCart($pid,$cid, $data){
    $conn = db_conn();
    $sql = "UPDATE cart set quantity = :quantity where Id = :cid and Product_Id = :pid";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':cid' => $cid,
            ':pid' => $pid,
            ':quantity' => $data['quantity']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


//Delete cart
function deleteCart($pid,$cid){
    $conn = db_conn();
    $sql = "DELETE FROM cart where Id = :cid and Product_Id = :pid ";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':cid' => $cid,
            ':pid' => $pid
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}



//cart part end

////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


//order part start


//Add Cart
function addOrder($data){
    $conn = db_conn();
    $sql = "INSERT into orders (ID, Product_Id, Price, Quantity, Total, OrderDate, Status) 
    VALUES (:Cid,  :Pid, :pp, :quantity, :total, SYSDATE(), :Status)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Cid'        => $data['cid'],
            ':Pid'        => $data['pid'],
            ':pp'         => $data['pp'],
            ':quantity'   => $data['quantity'],
            ':total'      => $data['total'],
            ':Status'     => $data['status']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}



//check cart existance
function showOrdersbyId($cid){
    $conn = db_conn();
    $sql = 'SELECT * from orders where id = :cid and status!=:status';
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':cid' => $cid,
            ':status' => 'Cancelled'
        ]);
        $row = $stmt->fetchAll();
        return $row;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}



function updateOrders($data){
    $conn = db_conn();
    $sql = "UPDATE orders set status = :status where Orderid = :id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $data['id'],
            ':status' => $data['status']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



//order part end

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>