<?php

class HTMLInputSubmit extends HTMLControl implements IControl{
    public function render():string{
        $html = '';
        $html .="<div>\n";
        $html .="\t<input name=\" $this->name \" value=\"$this->value\"";
        $html .=" type=\"submit\"";
        $html .= "/>\n";
        $html .="</div>\n";
        return $html;
    }
}
