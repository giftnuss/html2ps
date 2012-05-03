<?php

require_once dirname(dirname(__FILE__)) . '/TestBase.php';

$base = dirname(dirname(dirname(__FILE__))) . '/unittest';


require_once('pipeline.class.php');

require_once('unittest/generic.test.php');
require_once('unittest/fetcher.memory.php');

require_once(SIMPLETEST_DIR.'reporter.php');

require_once(dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once(HTML2PS_DIR.'pipeline.factory.class.php');

plan(1);

ok(chdir($base),"chdir $base");

if(!is_dir(HTML2PS_DIR . 'cache')) {
  mkdir(HTML2PS_DIR . 'cache') ||
    die("No cache directory!");
}

function unittest_ok($file)
{
  $testfile = "$file";

  $test = new TestSuite('Unittest');
  $reporter = new TextReporter();
  $test->addFile($testfile);

  ob_start();
  $test->run(new $reporter);
  $result = ob_get_contents();
  ob_end_clean();

  $lines = explode("\n",$result);
  array_pop($lines);
  $lastline = array_pop($lines);
  $result = array_pop($lines);

  is($result,"OK","$file - $lastline");
}

unittest_ok('test.autofix.url.php');
unittest_ok('test.block.absolute.php');
unittest_ok('test.border-bottom.php');
unittest_ok('test.border-left.php');
unittest_ok('test.border-right.php');
unittest_ok('test.border-top.php');
unittest_ok('test.containing.block.absolute.php');
unittest_ok('test.css.background.attachment.php');
unittest_ok('test.css.content.php');
unittest_ok('test.css.content.string.php');
unittest_ok('test.css.margin.boxes.php');
unittest_ok('test.css.page.break.after.php');
unittest_ok('test.css.page.break.before.php');
unittest_ok('test.css.page.break.inside.php');
unittest_ok('test.css.parse.atrules.php');
unittest_ok('test.css.parse.php');
unittest_ok('test.css.priority.php');
unittest_ok('test.float.php');
unittest_ok('test.font.inherit.php');
unittest_ok('test.font-size.php');
unittest_ok('test.html.mode.php');
unittest_ok('test.iframe.src.empty.php');
unittest_ok('test.iframe.src.missing.php');
unittest_ok('test.img.align.php');
unittest_ok('test.input.select.height.php');
unittest_ok('test.input.text.height.php');
unittest_ok('test.input.text.php');
unittest_ok('test.left.percentage.php');
unittest_ok('test.line-box.nested.php');
unittest_ok('test.line-box.top.php');
unittest_ok('test.line-height.100.php');
unittest_ok('test.link.php');
unittest_ok('test.note-call.width.php');
unittest_ok('test.orphans.inherit.php');
unittest_ok('test.orphans.php');
unittest_ok('test.pagebreak.border.php');
unittest_ok('test.pagebreak.br.php');
unittest_ok('test.pagebreak.fixed.height.php');
unittest_ok('test.pagebreak.php');
unittest_ok('test.pagebreak.table.br.php');
unittest_ok('test.pagebreak.table.lines.php');
unittest_ok('test.pagebreak.table.php');
unittest_ok('test.position.horizontal.absolute.positioned.php');
unittest_ok('test.radio.png.php');
unittest_ok('test.relative.php');
unittest_ok('test.table.absolute.php');
unittest_ok('test.table.border.nested.php');
unittest_ok('test.table.border.php');
unittest_ok('test.table.column.width.php');
unittest_ok('test.table.top-boundary.php');
unittest_ok('test.tag.ol.type.php');
unittest_ok('test.tag.ul.type.php');
unittest_ok('test.textarea.content.php');
unittest_ok('test.textarea.height.php');
unittest_ok('test.textarea.width.php');
unittest_ok('test.textarea.wrap.php');
unittest_ok('test.text-transform.php');
unittest_ok('test.white-space.php');
unittest_ok('test.widows.php');
unittest_ok('test.width.absolute.positioned.php');
unittest_ok('test.width.percentage.php');
