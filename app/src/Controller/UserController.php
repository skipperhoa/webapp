<?php

namespace App\Controller;

use Doctrine\DBAL\DriverManager;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Alias;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends AbstractController 
{
  
    private string $dbname;
    private string $user;
    private string $password;
    private string $host;
    private string $driver;
    private \Doctrine\DBAL\Connection $connection;
    public function __construct(){
        $this->dbname = 'symfony';
        $this->user = 'symfony';
        $this->password = '';
        $this->host = 'mariadb';
        $this->driver = 'pdo_mysql';

        $this->connection = $this->getConnection();

        //create table
        $this->table();
          
        
    }
    #[Route('/user', name:'index', methods: [ 'GET'])]
    public function index() : Response{

            /* get all users */
            $users = $this->getAll();
            return $this->render('user.html.twig', [
                'users' => $users,
            ]); 
 
    }
    #[Route('/user', name:'store', methods: [ 'POST'])]
    public function store(Request $request) : Response
    {
        $message = "";
        $firstname = $request->get("firstname");
        $lastname = $request->get("lastname");
        $address = $request->get("address");
        if($this->insert($firstname, $lastname, $address)) 
            $message="Thêm thành công";
        else
            $message="Thêm thất bại";  
        
        $this->addFlash('success', $message);
        return $this->redirectToRoute('index');
      
    }

   
    private function executeRequest($sql)
    {
        $stmt = $this->connection->prepare($sql);
        return $stmt->executeQuery()->fetchAllAssociative();
    }

    /* check connect server */
    public function getConnection() : \Doctrine\DBAL\Connection
    {
           $connectionParams = [
                'dbname' => $this->dbname,
                'user' => $this->user,
                'password' => $this->password,
                'host' => $this->host,
                'driver' => $this->driver,
            ];
          
            return DriverManager::getConnection($connectionParams);
     
            
    }

    /* check table  */
    public function table() : bool
    {
        $tableExists = $this->executeRequest("SELECT * FROM information_schema.tables WHERE table_schema = 'symfony' AND table_name = 'user' LIMIT 1;");
        
        if (empty($tableExists)) {
            // create table
            $this->executeRequest("CREATE TABLE user(id int AUTO_INCREMENT PRIMARY KEY, data varchar(255))");
            // insert user default
            $this->executeRequest("INSERT INTO user(id, data) values(1, 'Barack - Obama - White House')");
            $this->executeRequest("INSERT INTO user(id, data) values(2, 'Britney - Spears - America')");
            $this->executeRequest("INSERT INTO user(id, data) values(3, 'Leonardo - DiCaprio - Titanic')");
            return false;
        }
        
        return true;
    }

    /* get all users */
    public function getAll() : Array
    {
        $users = $this->executeRequest("SELECT * FROM user;");
        if (empty($users)) {
            $users = [];
        }
        return $users;
    }

    /* inser user */
    public function insert( string $firstname,  string $lastname,  string $address) : bool{

        $data = $firstname . " - " . $lastname . " - " . $address;
       
        $id = time();

        try {
            $this->executeRequest("INSERT INTO user(id, data) values(" . $id . ",'".$data."');");
            return true;
        } catch (\Exception $e) {
           
            error_log("Lỗi khi thêm user: " . $e->getMessage());
            return false;
        }

    }

    /* delete user */
    #[Route('/user/{id}',name:'',condition: "params['id'] > 0", methods: ['POST'])]
    public function destroy(int $id) : JsonResponse
    { 
       
        $sql = "SELECT * FROM user WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery(['id' =>$id]);

        if($result->rowCount() == 0)
            return $this->json([
                'success' => -1,
                'message' => "Không tìm thấy user",
            ]);
     
        $deleteSql = "DELETE FROM user WHERE id = :id";

        $deleteStmt = $this->connection->prepare($deleteSql);

        $deleteResult = $deleteStmt->executeStatement(['id' => $id]);
    
        if ($deleteResult > 0) {
            return $this->json([
                'success' => 1,
                'message' => "Xóa thành công",
               
            ]);
        } else {
            return $this->json([
                'success' => 0,
                'message' => "Có lỗi xảy ra khi xóa user",
               
            ]);
        }
    }



}