<?php

namespace php_html_table;

class Tth extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('th',$content,$attributes);
    }
}