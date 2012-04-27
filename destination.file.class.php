<?php

class DestinationFile extends Destination
{
  var $_destfile_name;
  var $_ouput_dir;
  
  public function setOutputDir($dirname)
  {
    $this->_ouput_dir = $dirname;
  }
  
  public function getOutputDir()
  {
    if(empty($this->_ouput_dir)) {
      return OUTPUT_FILE_DIRECTORY;
    }
    else {
      return $this->_ouput_dir;
    }
  }

  function process($tmp_filename, $content_type)
  {
    $dest_filename = $this->getOutputDir() .
      $this->filename_escape($this->get_filename()) . "." .
        $content_type->default_extension;

    if(false === copy($tmp_filename, $dest_filename)) {
      throw new IoError("Can not copy to file $dest_filename");
    }
  }
  
  function getResult()
  {
    return $this->_destfile_name;
  }
}
