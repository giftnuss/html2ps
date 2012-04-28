<?php
// $Header: /cvsroot/html2ps/css.border.right.color.inc.php,v 1.1 2006/09/07 18:38:13 Konstantin Exp $

class CSSBorderRightColor extends CSSSubProperty
{
  function set_value(&$owner_value, &$value)
  {
    $owner_value->right->setColor($value);
  }

  function get_value(&$owner_value)
  {
    return $owner_value->right->color->copy();
  }

  function get_property_code()
  {
    return CSS_BORDER_RIGHT_COLOR;
  }

  function get_property_name()
  {
    return 'border-right-color';
  }

  function parse($value)
  {
    return parse_css_color_decalration($value);
  }
}

