<?php

class CSSFontStyle extends CSSSubFieldProperty
{
  public function default_value()
  {
    return FS_NORMAL;
  }

  public function parse($value)
  {
    return parse_css_font_style($value);
  }

  function get_property_code()
  {
    return CSS_FONT_STYLE;
  }

  function get_property_name()
  {
    return 'font-style';
  }

}

