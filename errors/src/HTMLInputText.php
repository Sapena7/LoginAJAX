<?php

class HTMLInputText extends HTMLControl implements IControl{


     
    public function render():string{
        $html = '';
        $html .="<div>\n";
        $html .="<label> $this->label </label>";
        $html .="\t<input name=\" $this->name \" value=\"$this->value\"";
        $html .=" type=\"text\"";
        $html .= "/>\n";
        $html .="</div>\n";
        return $html;
    }
}
