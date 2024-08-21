<?php



class UserController extends Controller
{

    // private $sortRequest;
    // public function __construct()
    // {
    //     $this->sortRequest = $_POST['Routing'] ?? '';
    //     $this->handleRequest();
    // }

    // private function handleRequest()
    // {
    //     switch ($this->sortRequest) {
    //         case 'register':
    //             $username = $_POST['username'] ?? '';
    //             $name = $_POST['name'] ?? '';
    //             $surname = $_POST['surname'] ?? '';
    //             $this->register($username,  $name,  $surname);
    //             break;
    //         case 'login':
    //             $username = $_POST['username'] ?? '';
    //             $this->login($username);
    //             break;
    //         case 'logout':
    //             $this->logout();
    //             break;
    //         case 'switchAdminView':
    //             $this->toggleAdminView();
    //             break;
    //         case 'switchUserView':
    //             $this->toggleUserView();
    //             break;
    //         case 'updateUser':
    //             $username = $_PUT['username'] ?? '';
    //             $name = $_PUT['name'] ?? '';
    //             $surname = $_PUT['surname'] ?? '';
    //             $isAdmin = $_PUT['isAdmin'] ?? '';
    //             $this->updateUser($username,  $name,  $surname,  $isAdmin);
    //             break;
    //         default:
    //             echo "An error occurred: No valid identifier found";
    //             break;
    //     }
    // }

    public function test()
    {
        echo 'test';
    }

    public function login(string $username)
    {
        try {
            echo $username;

            header('Location: ' . UserModel::PFAD_USER_VIEW);

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
    public function register(string $username, string $name, string $surname)
    {
        $user = new UserModel(1, $name, $surname, false, $username);
    }

    public function logout()
    {
        try {

            $isLogoutOrSwitchAdminView = $_POST['isLogoutOrSwitchAdminView'] ?? '';

            if ($isLogoutOrSwitchAdminView == "logout") {
                header('Location: /LandingPage');
            } elseif ($isLogoutOrSwitchAdminView == "switchAdminView") {
                header('Location: /Admin');
            }
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }


    public function toggleAdminView()
    {
        try {
            header('Location: ' . UserModel::PFAD_ADMIN_VIEW);
            exit();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function toggleUserView()
    {
        try {
            header('Location: ' . UserModel::PFAD_USER_VIEW);
            exit();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function updateUser($username,  $name,  $surname,  $isAdmin)
    {
        try {

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}
