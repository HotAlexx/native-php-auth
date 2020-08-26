<?php
require_once('controllers/BaseController.php');

class App
{
    public function run()
    {
        $controller = new BaseController();
        $action = $this->getAction();
        if (method_exists($controller, $action)) {
            $controller->{$action}();
        } else {
            header("HTTP/1.0 404 Not Found");
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