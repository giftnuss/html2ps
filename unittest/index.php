<?php

error_reporting(E_ALL);
ini_set("display_errors","1");

require_once('generic.test.php');
require_once(SIMPLETEST_DIR.'reporter.php');

require_once('../config.inc.php');
require_once(HTML2PS_DIR.'pipeline.factory.class.php');

require_once('fetcher.memory.php');


$test = new TestSuite('All tests');
$reporter = new TextReporter(); // HtmlReporter();
$testfiles = glob('test.*.php');

foreach ($testfiles as $testfile) {
  //$test->addFile($testfile);
};

//$test->addFile('test.white-space.php');
$test->addFile('test.css.content.php');

$test->run(new $reporter);

