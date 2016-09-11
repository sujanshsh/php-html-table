<?php

namespace PHPHtmlTable;

use PHPHtmlTable\HtmlElement;
use PHPHtmlTable\TtrowGroup;

class HtmlTable {

    public $attributes = "";

    public $thead;
    public $tbody;
    public $caption = '';
    public $caption_attributes = "";

    private function set_attributes($attributes) {
        $this->attributes=$attributes;
    }

    public function __construct($attributes) {
        $this->attributes=$attributes;
        $this->tag_name='table';
        
        $this->thead = new TrowGroup('thead');
        $this->tbody = new TrowGroup('tbody');
    }

    public function echo_html() {
        $temp = new HtmlElement($this->tag_name,$this->create_content(),$this->attributes);
        echo $temp->get_html();
    }
    
    public function get_html() {
        $temp = new HtmlElement($this->tag_name,$this->create_content(),$this->attributes);
        return $temp->get_html();
    }
    
    private function create_content() {
        $caption_content='';        
        if(trim($this->caption)!='') {
            $temp = new HtmlElement('caption',$this->caption,$this->caption_attributes);
            $caption_content = $temp->get_html();
        }
        return $caption_content.$this->thead->get_html().$this->tbody->get_html();
    }
}

