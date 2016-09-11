<?php

namespace PHPHtmlTable;

use PHPHtmlTable\HtmlElement;

class Ttr extends HtmlElement{

    public $cells = array();

    protected $attributes="";
    
    public function __construct($attributes="") {
        $this->attributes=$attributes;
        $this->tag_name='tr';
        $this->content="";
    }

    public function add(HtmlElement $cell) {
        $this->cells[] = $cell;
    }

    public function echo_html() {
        $this->create($this->tag_name,$this->create_content(),$this->attributes);

        echo $this->html;
    }

    public function get_html() {
        $this->create($this->tag_name,$this->create_content(),$this->attributes);

        return $this->html;
    }

    private function create_content() {
        $str='';        
        foreach($this->cells as $cell) {
            $str.=$cell->get_html();
        }
        return $str;
    }
}
