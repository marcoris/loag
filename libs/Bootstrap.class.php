<?php

class Bootstrap
{
    private $url = null;
    private $controller = null;

    /**
     * Construct the Bootstrap
     * 
     * @return boolean|string
     */
    public function __construct()
    {
        // Sets the private $url
        $this->getUrl();

        // Load the default controller if no url is set
        if (empty($this->url[0])) {
            $this->loadDefaultController();
            return false;
        }

        // Load the existing controller if url is set
        $this->loadExistingController();

        // Call the controller method
        $this->callControllerMethod();
    }

    /**
     * Fetches the $_GET from url
     */
    private function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->url = rtrim($this->url, '/');
        $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
        $this->url = explode('/',$this->url);
    }

    /**
     * THis loads if there is no GET parameter passed
     */
    private function loadDefaultController()
    {
        require 'controllers/index.php';
        $this->controller = new Index();
        $this->controller->index();
    }

    /**
     * Load an existing controller if there is a GET parameter passed
     * 
     * @return boolean|string
     */
    private function loadExistingController()
    {
        $file = 'controllers/' . $this->url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->controller = new $this->url[0];
            $this->controller->loadModel($this->url[0]);
        } else {
            $this->error("Die Seite \"{$this->url[0]}\" existiert nicht!");   
        }
    }

    /**
     * If a method is passed in the GET url parameter
     */
    private function callControllerMethod()
    {
        // calling methods
        if (isset($this->url[2])) {
            if (method_exists($this->controller, $this->url[1])) {
                $this->controller->{$this->url[1]}($this->url[2]);
            } else {
                $this->error("Parameter \"{$this->url[2]}\" in \"{$this->url[1]}\" existiert nicht!");
            }
        } else {
            if (isset($this->url[1])) {
                if (method_exists($this->controller, $this->url[1])) {
                    $this->controller->{$this->url[1]}();
                } else {
                    $this->error("Methode \"{$this->url[1]}\" existiert nicht!");
                }
            } else {
                $this->controller->index();
            }
        }
    }

    /**
     * This handles the errors
     */
    public function error($msg = '') {
        require 'controllers/error.php';
        $this->controller = new ErrorHandler();
        $this->controller->index($msg);
        return false;
    }
}
