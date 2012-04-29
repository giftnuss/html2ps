<?php
/**
 * @brief helper class building the generic document structure
 * @author Konstantin
 * @package DOM
 */
class TreeBuilder
{
  public static function build($xmlstring,$mode = 'html')
  {
    if (empty($xmlstring)) {
      throw new DomError("Can not build tree from empty xml.");
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

