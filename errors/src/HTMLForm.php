<?php

require ('IControl.php');

class HTMLForm implements IControl , Countable {
    private $action = '';
    private $method = '';
    private $elements = [];

    function __construct(string $action, string $method) {
        $this->action = $action;
        $this->method = $method;

    }

    function __clone () {
        echo "s'ha clonat un objecte";

    }

    public function render():string {
        $html = "";
        $html .= "<form action=\"". $this->action ."\" method=\"". $this->method. "\">\n";

        foreach ($this->elements as $element) {
            $html.=$element->render();
        }

        $html .= "</form>\n";
        return $html;

    }

    /*
    public function add(HTMLControl $element) {
        $this->elements[] = $element;

    }
    */

    public function add(iControl $element) {
        $this->elements[] = $element;

    }
    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
                
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getMethod():string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }


    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
       return count($this->elements);
    }
}
