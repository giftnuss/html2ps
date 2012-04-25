<?php

require_once dirname(dirname(__FILE__)) . '/TestBase.php';

require_ok('pipeline.class.php');

$html = <<<__HTML__
<HTML>

<HEAD>

<TITLE>Your Title Here</TITLE>

</HEAD>

<BODY BGCOLOR="FFFFFF">

<CENTER><IMG SRC="clouds.jpg" ALIGN="BOTTOM"> </CENTER>

<HR>

<a href="http://somegreatsite.com">Link Name</a>

is a link to another nifty site

<H1>This is a Header</H1>

<H2>This is a Medium Header</H2>

Send me mail at <a href="mailto:support@yourcompany.com">

support@yourcompany.com</a>.

<P> This is a new paragraph!

<P> <B>This is a new paragraph!</B>

<BR> <B><I>This is a new sentence without a paragraph break, in bold italics.</I></B>

<HR>

</BODY>

</HTML> 
__HTML__;

$tree = TreeBuilder::build($html);

isa_ok($tree,'DOMTree','object is a DOMTree');

is($tree->node_type(),XML_ELEMENT_NODE,'node type is element');
is($tree->tagname(),'html','element name is html');

