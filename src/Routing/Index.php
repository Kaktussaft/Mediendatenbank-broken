<?

namespace Webapp\src\Routing;

require 'Routing.Router.php';
require 'UserController.php';
require 'MediumController.php';

use Webapp\src\Controller\UserController;
use Webapp\src\Controller\MediumController;
use Webapp\src\Routing\Router;

// DB connection

$router = new Router();
$userController = new UserController;
$mediumController = new MediumController;

$router->post("/LandingPage", [$userController, "login"]);
$router->post("/User", [$userController, "logout"]);
$router->post("/Admin", [$userController, "toggleAdminView"]);

$router->delete("/USER", [$mediumController, "deleteMedium"]);
$router->delete("/ADMIN", [$userController, "deleteUser"]); 

$router->put("/USER", [$mediumController, "updateMedium"]);
$router->put("/USER", [$mediumController, "uploadMedium"]);
$router->put("/ADMIN", [$mediumController, "updateKeywords"]);
$router->put("/ADMIN", [$userController, "updateUser"]); 

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$response = $router->dispatch($method, $path);
echo $response;

?>

