<?php


class FrontController
{
    private static $instance;

    protected $controller;

    protected $action;

    protected $body;

    protected $params = [];

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * FrontController constructor.
     */
    private function __construct()
    {
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/', trim($request, '/'));
        $this->controller = !empty($splits[0]) ? ucfirst($splits[0]) . 'Controller' : 'IndexController';
        $this->action = !empty($splits[1]) ? $splits[1] . 'Action' : 'indexAction';

        if (!empty($splits[2])) {
            $key = $value = [];

            for($i=2, $cnt = count($splits); $i < $cnt; $i++) {
                if($i%2 == 0) {
                    $key[] = $splits[$i];
                } else {
                    $value[] = $splits[$i];
                }
            }

            if (count($key) > count($value)) {
                $value[] = null;
            }

            $this->params = array_combine($key, $value);
        }
    }

    private function __clone()
    {
    }

    public function route()
    {
        if (class_exists($this->controller)) {
            $rc = new ReflectionClass($this->controller);
            if ($rc->hasMethod($this->action)) {
                $controller = $rc->newInstance();
                $method = $rc->getMethod($this->action);
                $method->invoke($controller);
            } else {
                throw new Exception('Method '. $this->action . ' does not exist');
            }
        } else {
            throw new Exception('Controller '. $this->controller . ' does not exist');
        }
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        if (empty($this->params)) {
            return [];
        }
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}