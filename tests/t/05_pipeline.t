<?php

require_once dirname(dirname(__FILE__)) . '/TestPipeline.php';

plan(6);

$pipeline = new Pipeline();
$pipeline->configure(array());

isa_ok($pipeline->get_dispatcher(),'Dispatcher','default dispatcher class');

ok(is_null($pipeline->get_current_css()),'no current css');
$pipeline->reset_css();
isa_ok($pipeline->get_current_css(),'CSSRuleset','add fressh css ruleset');

$media = Media::predefined('test_media');
isa_ok($media,'Media','media object');

$outputdriver = new OutputDriverFPDF($media);
$pipeline->set_output_driver($outputdriver);

$parser = new ParserXHTML();
$html = <<<__HTML__
<html>
  <body>
    TEST
  </body>
</html>
__HTML__;

$first = $parser->process($html,$pipeline,$media);
isa_ok($first,'InlineBox','root is a InlineBox');

# InlineBox
#  \ InlineBox
#    \ WhitespaceBox
#    \ TextBox
#    \ WhitespaceBox
$one = $first->get_content();
is(trim($one),'TEST','expected content found');

