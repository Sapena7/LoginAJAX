<?php


class HTMLForm{

    private $action ="";
    private $method ="";
    private $elements = [];

    function __construct(string $action, string $method) {
        $this->action = $action;
        $this->method = $method;
    }

    public function render():string{
        $html="";
        $html.= "<form action=" . $this->action . " method = " . $this->method . ">" . "\n";
        foreach ($this->elements as $element) {
            $html .= $element->render();
        }
        $html .= "</form>\n";
        return $html;
    }

    public function getAction():string{
        return $this->action;
    }

    public function getMethod():string {
        return $this->method;
    }

    public function setAction($action) {
        $this->action = $action;
    }
    public function setMethod($method) {
        $this->method = $method;
    }

    public function add(HTMLControl $element){
        $this->elements[] = $element;
    }

    function __clone(){
        echo "s'ha clonat un objecte";
    }
}