<?php

require_once dirname(dirname(__FILE__)) . '/TestBase.php';

plan(2);

try {
    $doc = make_doc('<html>');
    print_r(CSS::get());
exit(0);

    isa_ok($doc,'InlineBox','document root is a "InlineBox"');

    ok($block = $doc->get_element_by_id('block'),"document contains block");
    $body = $doc->get_body();

#    print_r($doc);
exit(0);
    is($block->get_top_margin(), $body->get_top() - mm2pt(20),"top margin");
    is($block->get_left_margin(), mm2pt(10), "left margin");

}
catch(TodoError $err) {
    echo $err->getTraceAsString();
}


