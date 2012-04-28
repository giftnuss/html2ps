<?php

class CSSFontWeight extends CSSSubFieldProperty
{
  function default_value()
  {
    return WEIGHT_NORMAL;
  }

  function parse($value)
  {
    return parse_css_font_weight($value);
  }

  function get_property_code()
  {
    return CSS_FONT_WEIGHT;
  }

  function get_property_name()
  {
    return 'font-weight';
  }
}
