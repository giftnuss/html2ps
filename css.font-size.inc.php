<?php

class CSSFontSize extends CSSSubFieldProperty
{
  var $_defaultValue;

  function __construct(&$owner, $field)
  {
    parent::__construct($owner, $field);
    $this->_defaultValue = Value::fromData(BASE_FONT_SIZE_PT, UNIT_PT);
  }

  function default_value()
  {
    return $this->_defaultValue;
  }

  function parse($value)
  {
    return parse_css_font_size($value);
  }

  function get_property_code()
  {
    return CSS_FONT_SIZE;
  }

  function get_property_name()
  {
    return 'font-size';
  }
}

