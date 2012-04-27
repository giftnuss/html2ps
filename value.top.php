<?php

class ValueTop extends CSSValuePercentage
{
  public static function fromString($value)
  {
    return CSSValuePercentage::_fromString($value, new ValueTop);
  }

  function copy()
  {
    $value = parent::_copy(new ValueTop);
    return $value;
  }
}

