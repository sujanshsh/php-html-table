<?php

namespace php_html_table;

class Ttd extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('td',$content,$attributes);
    }
}
