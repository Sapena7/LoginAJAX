<?php

class HTMLSelect extends HTMLControl implements IControl{

    protected $arrayOptions = [];

    public function __construct($nome, $value, $label, $arrayOptions)
    {
        parent::__construct($nome, $value, $label);
        try {
            if (empty($arrayOptions)){
                throw new OptionsNotFoundException();
            }

            foreach ($arrayOptions as $option){
                if (!array_key_exists("name", $option) || !array_key_exists("value", $option)) {
                    throw new InvalidFormatOptionsException();
                }
            }
            $this->arrayOptions = $arrayOptions;
        } catch (OptionsNotFoundException $e) {
            echo "No hay opciones" . "<br>";
        }catch (InvalidFormatOptionsException $e) {
            echo "Hay algun array sin esas llaves" . "<br>";
        }
    }

    public function render():string{
        $html = '';
        $html .="<div>\n";
        $html .="<select>";
        foreach ($this->arrayOptions as $opt) {
            $html .="\t\t<option value=\"{$opt['value']}\">";
            $html .="{$opt['name']}";
            $html .="</option>";
        }

        $html .= "/>\n";
        $html .="<label> $this->label </label>";
        $html .="</div>\n";
        return $html;
    }
}
