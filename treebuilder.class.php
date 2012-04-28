<?php
// $Header: /cvsroot/html2ps/treebuilder.class.php,v 1.17 2007/05/06 18:49:29 Konstantin Exp $

require_once(HTML2PS_DIR.'dom.php5.inc.php');

class TreeBuilder
{
  public static function build($xmlstring,$mode = 'html')
  {
    if (empty($xmlstring)) {
      throw new DomError("Can not buid tree with empty xml.");
    }

    $doc = new DOMDocument();
    switch(strtolower($mode)) {
    case 'html': $dom_loaded = $doc->loadHTML($xmlstring); break;
    case 'xml': $dom_loaded = $doc->loadXML($xmlstring); break;
    default:
       throw new ParserError("Invalid parser mode '$mode'.");
    }
    if(!$dom_loaded) {
      throw new DomError("DOMDocument parser error.");
    }
    return DOMTree::from_DOMDocument($doc);
  }
}

