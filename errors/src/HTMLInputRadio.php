<?php

class HTMLInputRadio extends HTMLControl implements IControl{
     
    public function render():string{
        $html = '';
        $html .="<div>\n";
        $html .="\t<input name=\" $this->name \" value=\"$this->value\"";
        $html .=" type=\"radio\"";
        $html .= "/>\n";
        $html .="<label> $this->label </label>";
        $html .="</div>\n";
        return $html;
    }
}
