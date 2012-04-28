<?php

function parse_css_font_size()
{
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }

    $value = trim(strtolower($value));

    switch($value) {
    case "xx-small":
      return Value::fromData(BASE_FONT_SIZE_PT*3/5, UNIT_PT);
    case "x-small":
      return Value::fromData(BASE_FONT_SIZE_PT*3/4, UNIT_PT);
    case "small":
      return Value::fromData(BASE_FONT_SIZE_PT*8/9, UNIT_PT);
    case "smaller":
      return Value::fromData(0.83, UNIT_EM); // 0.83 = 1/1.2
    case "medium":
      return Value::fromData(BASE_FONT_SIZE_PT, UNIT_PT);
    case "large":
      return Value::fromData(BASE_FONT_SIZE_PT*6/5, UNIT_PT);
    case "larger":
      return Value::fromData(1.2, UNIT_EM);
    case "x-large":
      return Value::fromData(BASE_FONT_SIZE_PT*3/2, UNIT_PT);
    case "xx-large":
      return Value::fromData(BASE_FONT_SIZE_PT*2/1, UNIT_PT);
    };

    if (preg_match("/(\d+\.?\d*)%/i", $value, $matches)) {
      return Value::fromData($matches[1]/100, UNIT_EM);
    };

    return Value::fromString($value);
}

function parse_css_font_weight($value)
{
    switch (trim(strtolower($value))) {
    case 'inherit':
      return CSS_PROPERTY_INHERIT;
    case 'bold':
    case '700':
    case '800':
    case '900':
    case 'bolder':
      return WEIGHT_BOLD;
    case 'lighter':
    case 'normal':
    case '100':
    case '200':
    case '300':
    case '400':
    case '500':
    case '600':
    default:
      return WEIGHT_NORMAL;
    }
}

function parse_css_font_style($value)
{
    $value = trim(strtolower($value));
    switch ($value) {
    case 'inherit':
      return CSS_PROPERTY_INHERIT;
    case 'normal':
      return FS_NORMAL;
    case 'italic':
      return FS_ITALIC;
    case 'oblique':
      return FS_OBLIQUE;
    }
}

function parse_css_color_declaration($value)
{
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }
    return parse_color_declaration($value);
}

function parse_css_border_style($value)
{
    $value = trim(strtolower($value));

    switch ($value) {
    case "inherit":
      return CSS_PROPERTY_INHERIT;
    case "solid":
      return BS_SOLID;
    case "dashed":
      return BS_DASHED;
    case "dotted":
      return BS_DOTTED;
    case "double":
      return BS_DOUBLE;
    case "inset":
      return BS_INSET;
    case "outset":
      return BS_OUTSET;
    case "groove":
      return BS_GROOVE;
    case "ridge":
      return BS_RIDGE;
    default:
      return BS_NONE;
    }
}
