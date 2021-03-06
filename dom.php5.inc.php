<?php

class DOMTree
{
  var $domelement;
  var $content;
  
  function __construct($domelement)
  {
    $this->domelement = $domelement;
    $this->content = $domelement->textContent;
  }

  function document_element()
  { 
    return $this; 
  }

  function first_child()
  {
    if ($this->domelement->firstChild) {
      $child = new DOMTree($this->domelement->firstChild);
      return $child;
    }
    else {
      return false;
    }
  }

  public static function from_DOMDocument($domdocument)
  {
    $doc = $domdocument->documentElement;
    if(!$doc) {
      throw new DomError("DOMDocument contains no documentElement.");
    }    
    $tree = new DOMTree($doc);
    return $tree;
  }

  function get_attribute($name)
  { 
    return $this->domelement->getAttribute($name); 
  }

  function get_content()
  { 
    return $this->domelement->textContent; 
  }

  function has_attribute($name)
  { 
    return $this->domelement->hasAttribute($name); 
  }

  function last_child()
  {
    $child = $this->first_child();

    if ($child) {
      $sibling = $child->next_sibling();
      while ($sibling) {
        $child = $sibling;
        $sibling = $child->next_sibling();
      }
    }

    return $child;
  }

  function next_sibling()
  {
    if ($this->domelement->nextSibling) {
      $child = new DOMTree($this->domelement->nextSibling);
      return $child;
    }
    else {
      return false;
    }
  }
  
  function node_type()
  { 
    return $this->domelement->nodeType; 
  }

  function parent()
  {
    if ($this->domelement->parentNode) {
      $parent = new DOMTree($this->domelement->parentNode);
      return $parent;
    } 
    else {
      return false;
    }
  }

  function previous_sibling()
  {
    if ($this->domelement->previousSibling) {
      $sibling = new DOMTree($this->domelement->previousSibling);
      return $sibling;
    }
    else {
      return false;
    }
  }

  function tagname()
  { 
    return $this->domelement->localName; 
  }
}
