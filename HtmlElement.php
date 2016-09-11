<?php 

namespace PHPHtmlTable;

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
