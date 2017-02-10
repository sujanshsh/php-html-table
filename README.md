# php-html-table
class for creating dynamic html table

Usage Example:

```php
$t=new HtmlTable('class="table"');
$t->caption="Testing Table";
$t->caption_attributes='style="font-weight: bold;"';
$t->thead->add_row();
$t->thead->th_array(array(
    'SN',
    'Name',
    'Price',
    'Quantity',
    'Total'
));
$t->tbody->add_row();
$t->tbody->td('1');
$t->tbody->td('Test');
$t->tbody->td('100');
$t->tbody->td('3');
$t->tbody->td('300');
$t->tbody->add_row();
$t->tbody->td('','colspan="4"');
$t->tbody->td('300');
$t->echo_html();
```

### Mentors:   
1. [bdryagya](https://github.com/bdryagya)
2. [pkatuwal](https://github.com/pkatuwal)
