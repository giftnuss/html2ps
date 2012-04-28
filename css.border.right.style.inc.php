<?php

class CSSBorderRightStyle extends CSSSubProperty
{
  function set_value(&$owner_value, &$value)
  {
    $owner_value->right->style = $value;
  }

  function get_value(&$owner_value)
  {
    return $owner_value->right->style;
  }

  function get_property_code()
  {
    return CSS_BORDER_RIGHT_STYLE;
  }

  function get_property_name()
  {
    return 'border-right-style';
  }

  function parse($value)
  {
    return parse_css_border_style($value);
  }
}

