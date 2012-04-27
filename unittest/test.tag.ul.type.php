<?php

class TestTagUlType extends GenericTest {
  function testTagUlType1() {
    $tree = $this->runPipeline(file_get_contents('test.tag.ul.type.html'));

    $ul =& $tree->get_element_by_id('ul_disc');
    $this->assertEqual(LST_DISC, $ul->get_css_property(CSS_LIST_STYLE_TYPE));

    $ul =& $tree->get_element_by_id('ul_circle');
    $this->assertEqual(LST_CIRCLE, $ul->get_css_property(CSS_LIST_STYLE_TYPE));

    $ul =& $tree->get_element_by_id('ul_square');
    $this->assertEqual(LST_SQUARE, $ul->get_css_property(CSS_LIST_STYLE_TYPE));
  }
}

?>