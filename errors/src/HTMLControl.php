<?php
require 'OptionsNotFoundException.php';
require 'InvalidFormatOptionsException.php';
abstract class HTMLControl implements IControl {
    protected $name;
    protected $value;
    protected $label;
    
    public function __construct($name, $value, $label){

        try {
            if (empty($name))
                throw new Exception ("L'atribut name no pot estar buit");
            $this->name = $name;
        } catch (Exception $e) {
            echo "S'ha produït el següent error: " . $e->getMessage() . "<br>";
        }


        $this->value = $value;
        $this->label = $label;
    }


    public function render():string{
        $html = '';
        $html .="<div>\n";
                $html .="\t<label> $this->label </label>\n";
                $html .="\t<select name=\" $this->name \">\n";
                $html .= "\t</select>\n";
                $html .="\t<input name=\" $this->name \" value=\"$this->value\"";
                $html .=" type=\"submit\"";
                $html .= "/>\n";

        $html .="</div>\n";
        return $html;
    }

}
