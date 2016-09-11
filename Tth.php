<?php

namespace PHPHtmlTable;

use PHPHtmlTable\HtmlElement;

class Tth extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('th',$content,$attributes);
    }
}