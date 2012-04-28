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

function unittest_ok($file)
{
  global $base;
  $testfile = "$base/$file";

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

