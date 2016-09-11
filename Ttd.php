<?php

namespace PHPHtmlTable;

use PHPHtmlTable\HtmlElement;

class Ttd extends HtmlElement {
    public function __construct($content, $attributes="") {
        $this->create('td',$content,$attributes);
    }
}
