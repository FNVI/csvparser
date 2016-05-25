<?php

namespace FNVi\CSVParser;

/**
 * Description of CSVParser
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVParser implements \Iterator{
    
    private $handle;
    private $useHeadings;
    private $headings;
    private $currentRow;
    private $counter = 0;
    
    public function __construct($filename, $useHeadings = true) {
        $this->useHeadings = $useHeadings;
        $this->handle = fopen($filename, "r");
        if($this->handle === false){
            exit('Script was canceled, file cannot be read'); 
        }
    }
    
    private function combine($data){
        
    }
    
    public function getHeadings(){
        $this->next();
        $this->headings = $this->currentRow;
        return $this->headings;
    }

    public function current() {
        $this->counter++;
        return $this->currentRow;
    }

    public function key() {
        return $this->counter;
    }

    public function next() {
        return $this->currentRow = fgetcsv($this->handle);
    }

    public function rewind() {
        rewind($this->handle);
    }

    public function valid() {
        if(feof($this->handle)){
            fclose($this->handle);
            return false;
        }
        return true;
    }

}
