<?php  

require_once 'db_connection.php';


/////////////////////////////////////////////////////////////////////////////////////////////////////
//Admin part start



//Check if email already exist
function checkEmail($email){
    $conn = db_conn();
    $sql = "SELECT * from admin where Email = ?";
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
    $sql = "SELECT * from admin where Username = ?";
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






//Add Admin / Registration admin to database
function addAdmin($data){
    $conn = db_conn();
    $sql = "INSERT into admin (Username, Name, Email, Pass, Status) 
    VALUES (:Username, :Name, :Email, :Password, :Status)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Username'  => $data['uname'],
            ':Name'      => $data['name'],
            ':Email'     => $data['email'],
            ':Password'  => $data['pass'],
            ':Status' => $data['status']
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
    $sql="SELECT * from admin where (username = :uname or email = :email) and pass = :pass";
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



//for show profile details
function selectid($info){
    $conn = db_conn();
    $sql = "SELECT * FROM admin where (Username = :Username or Email = :Email)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Username'  => $info,
            ':Email'      => $info
        ]);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}


//Update Admin
function updateAdminProfile($id, $data){
    $conn = db_conn();
    $sql = "UPDATE admin set Username = :Username, Name = :Name, Email = :Email where Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
         ':Username' => $data['uname'], 
         ':Name' => $data['name'], 
         ':Email' => $data['email'], 
         ':Id' => $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateAdminPass($id, $data){
    $conn = db_conn();
    $sql = "UPDATE admin set pass = :Pass where Id = :Id ";
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


//Show admin details by id
function showAdminById($id){
	$conn = db_conn();
	$sql = "SELECT * FROM admin where Id = :Id ";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Id' => $id
        ]);
        $row = $stmt->fetch();

        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }  
}


//Show all Admin
function showAdmin(){
    $conn = db_conn();
    $sql = 'SELECT * FROM admin';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}




//Delete Admin
function deleteAdmin($id){
    $conn = db_conn();
    $sql = "DELETE FROM admin WHERE Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([':Id' => $id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


function changeStatus($data){
    $conn = db_conn();
    $sql = "UPDATE admin set status = :Status where Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Status' => $data['status'],
            ':Id' => $data['id']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


// //Search Admin
function searchAdmin($search){
    $conn = db_conn();
    $sql = "SELECT * FROM admin where id like ('%$search%') or username  LIKE ('%$search%') or name like upper('%$search%') or email like ('%$search%') or status like ('%$search%')";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }   
}

//Admin part end

///////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////


//Customer part start

//Check if email already exist
function checkCEmail($email){
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
function checkCUsername($username){
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

//Show all Customer
function showCustomer(){
    $conn = db_conn();
    $sql = 'SELECT * FROM customer order by id';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
    return $rows;

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

//Add customer
function addCustomer($data){
    $conn = db_conn();
    $sql = "INSERT into customer (Username, Name, Email, Phone, Gender, Address, Password, ProfilePic) 
    VALUES (:Username, :Name, :Email, :Phone, :Gender, lower(:Address), :Password, :ProfilePic)";
    
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

//Delete Customer
function deleteCustomer($id){
    $conn = db_conn();
    $sql = "DELETE FROM CUSTOMER WHERE Id = :Id";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([':Id' => $id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//Search customer
function searchCustomer($search){
    $conn = db_conn();
    $sql = "SELECT * FROM customer where id like ('%$search%') or username  LIKE upper('%$search%') or name like upper('%$search%') or email like ('%$search%') or phone like ('%$search%') or gender like ('%$search%') or address like ('%$search%') ";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }   
}



//Customer part end 
//////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////

//category part start


//Show all categorys
function showCategory(){
    $conn = db_conn();
    $sql = 'SELECT * FROM category order by Category_Id';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    } 
}


//Add category
function addCategory($data){
    $conn = db_conn();
    $sql = "INSERT into category (Category_Name) VALUES (upper(:Name))";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Name'      => $data['name'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//category part end

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//manufacturer part end


//Show all manufacturer
function showManufacturer(){
    $conn = db_conn();
    $sql = 'SELECT * FROM manufacturer order by Manufacturer_id';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}


//Add manufacturer
function addManufacturer($data){
    $conn = db_conn();
    $sql = "INSERT into manufacturer (Manufacturer_Name) VALUES (upper(:Name))";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Name'   => $data['name'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}



//manufacturer part end

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Product part start

//Show all product
function showProduct(){
    $conn = db_conn();
    $sql = 'SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID order by product_id';
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}



//Add Product
function addProduct($data){
    $conn = db_conn();
    $sql = "INSERT into product (Product_Name, Product_Price, Category_Id, Manufacturer_Id, Stock, Image) 
    VALUES (upper(:Product_Name), :Product_Price, :Category_Id, :Manufacturer_Id, :Stock, :Image)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Product_Name'      => $data['name'],
            ':Product_Price'     => $data['price'],
            ':Category_Id'     => $data['catagory'],
            ':Manufacturer_Id'    => $data['manufacturer'],
            ':Stock'   => $data['stock'],
            ':Image'  => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//Show product details by id
function showProductById($id){
    $conn = db_conn();
    $sql = "SELECT * FROM product where product_id = :Id ";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Id' => $id
        ]);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }  
}


//Update Admin
function updateProduct($id, $data){
    $conn = db_conn();
    $sql = "UPDATE product set PRODUCT_PRICE = :price, stock = stock + :stock where PRODUCT_ID = :ID";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
         ':price' => $data['price'], 
         ':stock' => $data['stock'], 
         ':ID' => $id
        ]);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}




//Search product
function searchProduct($search){
    $conn = db_conn();
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, Category_name, Manufacturer_name, STOCK, image FROM PRODUCT, CATEGORY, MANUFACTURER WHERE (PRODUCT.CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.MANUFACTURER_ID = MANUFACTURER.MANUFACTURER_ID) AND (Product_name LIKE upper('%$search%') or CATEGORY_name like upper('%$search%') or Manufacturer_name like upper('%$search%')) order by product_id";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }   
}


//product part end

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//order part start



function showOrders(){
    $conn = db_conn();
    $sql = 'SELECT orderid,name,address,product_name,price,quantity,total,OrderDate,status from orders,customer,product where orders.id=customer.id and product.product_id = orders.product_id';
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
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



//Search order
function searchOrder($search){
    $conn = db_conn();
    $sql = "SELECT orderid,name,address,product_name,price,quantity,total,OrderDate,status from orders,customer,product where orders.id=customer.id and product.product_id = orders.product_id and (orderid like ('%$search%') or name  LIKE upper('%$search%') or address like ('%$search%') or product_name like upper('%$search%') or orderdate like ('%$search%') or status like('%$search%'))  ";
    try{
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }   
}


//order part end

////////////////////////////////////////////////////////////////////////////////////////////////////////////////








?>