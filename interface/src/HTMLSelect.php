<?php

class HTMLSelect extends HTMLControl implements IControl{

    protected $arrayOptions = [];

    public function __construct($name, $value, $label, $arrayOptions)
    {
        parent::__construct($name, $value, $label);
        try {
            if (empty($arrayOptions))
                throw new OptionsNotFoundException();
            $this->arrayOptions = $arrayOptions;
        }
        catch (OptionsNotFoundException $o) {
            echo "S'ha produït el següent error:". $o->getMessage();
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
