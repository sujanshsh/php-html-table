<?php

namespace php_html_table;

class HtmlElement {

    protected $tag_name='';

    protected $content='';

    protected $html='';

    public function __construct($tag_name,$content="",$attributes="") {
        $this->create($tag_name,$content,$attributes);
    }

    public function create($tag_name,$content="",$attributes="") {
        if($attributes=='')
            $this->html="<$tag_name>$content</$tag_name>";
        else
            $this->html="<$tag_name $attributes>$content</$tag_name>";
        
        $this->tag_name=$tag_name;
        $this->content=$content;
        $this->attributes=$attributes;
    }

    public function echo_html() {
        echo $this->html;
    }

    public function get_html() {
        return $this->html;
    }
}

class Ttd extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('td',$content,$attributes);
    }
}

class Tth extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('th',$content,$attributes);
    }
}

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
        return $temp->get_html;
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

