<?php
require_once('controllers/BaseController.php');
require_once('models/User.php');

class App
{
    public function run()
    {
        $controller = new BaseController();
        $action = $this->getAction();
        if (method_exists($controller, $action)) {
            $user = new User();
            if (in_array($action, $controller->auth_actions) && !$user->auth()) {
                header('Location: /?action=login');
            }
            $controller->{$action}();
        } else {
            header("HTTP/1.1 404 Not Found");
        }
    }

    protected function getAction()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }

        return $action;
    }
}