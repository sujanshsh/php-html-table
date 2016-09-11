<?php

namespace PHPHtmlTable;

use PHPHtmlTable\HtmlElement;
use PHPHtmlTable\Tth;
use PHPHtmlTable\Ttd;
use PHPHtmlTable\Ttr;

class TrowGroup {

    private $rows = array();
    private $attributes;
    private $rcount = -1;

    public function __construct($tag_name,$attributes="") {
        $this->attributes=$attributes;
        $this->tag_name=$tag_name;
    }

    private function set_attributes($attributes) {
        $this->attributes=$attributes;
    }
    
    public function add_row($attributes="") {
        $this->rows[] = new Ttr($attributes);
        $this->rcount++;
    }

    public function th($content, $attributes="") {
        $th = new Tth( $content,$attributes);
        $this->rows[$this->rcount]->add($th);
    }
    
    public function th_array(array $ta) {
        foreach($ta as $th) {
            $this->th($th);
        }
    }
    
    public function td($content, $attributes="") {
        $td = new Ttd( $content,$attributes);
        $this->rows[$this->rcount]->add($td);
    }
    
    public function td_array(array $ta) {
        foreach($ta as $th) {
            $this->td($th);
        }
    }

    public function echo_html() {
        $temp = new HtmlElement($this->tag_name,$this->create_content(),$this->attributes);
        $temp->echo_html;
    }

    public function get_html() {
        $temp = new HtmlElement($this->tag_name,$this->create_content(),$this->attributes);
        return $temp->get_html();
    }

    private function create_content() {
        $str='';
        foreach($this->rows as $row) {
            $str.=$row->get_html();
        }
        return $str;
    }
}
