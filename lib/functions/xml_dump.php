<?php
/*
 * Dump XML (DOMNode) as Tree.
 *
 * @link http://stackoverflow.com/q/684227/367456
 */

abstract class IteratorDecoratorStub implements OuterIterator
{
	private $iterator;
	public function __construct(Iterator $iterator)
	{
		$this->iterator = $iterator;
	}
	public function getInnerIterator()
	{
		return $this->iterator;
	}
	public function rewind()
	{
		$this->iterator->rewind();
	}
	public function valid()
	{
		return $this->iterator->valid();
	}
	public function current()
	{
		return $this->iterator->current();
	}
	public function key()
	{
		return $this->iterator->key();
	}
	public function next()
	{
		$this->iterator->next(); 
	}
}

abstract class
  RecursiveIteratorDecoratorStub 
extends 
  IteratorDecoratorStub 
implements 
  RecursiveIterator
{
	public function __construct(RecursiveIterator $iterator)
	{
		parent::__construct($iterator);
	}
	public function hasChildren()
	{
		return $this->getInnerIterator()->hasChildren();
	}
	public function getChildren()
	{
	  // return new static($this->getInnerIterator()->getChildren());
	  // new static ist ein php5.3 feature - wen ich es richtig verstehe bedeutet es:
	  $class = get_class($this);
	  return new $class($this->getInnerIterator()->getChildren());
	}
}

class DOMIterator extends IteratorDecoratorStub
{
	public function __construct($nodeOrNodes)
	{
		if ($nodeOrNodes instanceof DOMNode)
		{
			$nodeOrNodes = array($nodeOrNodes);
		}
		elseif ($nodeOrNodes instanceof DOMNodeList)
		{
			$nodeOrNodes = new IteratorIterator($nodeOrNodes);
		}
		if (is_array($nodeOrNodes))
		{
			$nodeOrNodes = new ArrayIterator($nodeOrNodes);
		}
		
		if (! $nodeOrNodes instanceof Iterator)
		{
			throw new InvalidArgumentException('Not an array, DOMNode or DOMNodeList given.');
		}
		
		parent::__construct($nodeOrNodes);
	}
}

class DOMRecursiveIterator extends DOMIterator implements RecursiveIterator
{
	public function hasChildren()
	{
		return $this->current()->hasChildNodes();
	}
	public function getChildren()
	{
		$children = $this->current()->childNodes;
		return new self($children);
	}
}

class DOMRecursiveDecoratorStringAsCurrent extends RecursiveIteratorDecoratorStub
{
	public function current()
	{
		$node = parent::current();
		$nodeType = $node->nodeType;
		
		switch($nodeType)
		{
			case XML_ELEMENT_NODE:
				$attributes = $this->_current_attr($node);
				return "<{$node->tagName} {$attributes} >";

			case XML_TEXT_NODE:
				return $node->nodeValue;

			default:
				return sprintf('(%d) %s', $nodeType, $node->nodeValue);
		}
	}
	
	protected function _current_attr($node)
	{
		$result = array();
		$map = $node->attributes;
		for($i = 0; $i < $map->length; ++$i) {
			$result[] = $map->item($i)->nodeName;
		}
		return join(", ",$result);
	}
}

function xmltree_dump(DOMNode $node)
{
	$iterator = new DOMRecursiveIterator($node);
	$decorated = new DOMRecursiveDecoratorStringAsCurrent($iterator);
	$tree = new RecursiveTreeIterator($decorated);
	foreach($tree as $key => $value)
	{
		echo $value . "\n";
	}
}
