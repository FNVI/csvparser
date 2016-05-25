<?php

namespace FNVi\CSVParser;

/**
 * Description of CSVParser
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVParser implements \Iterator{
    
    private $filename;
    private $handle;
    private $useHeadings;
    private $headings = [];
    private $currentRow;
    private $counter = 0;
    
    public function __construct($filename, $useHeadings = true) {
        $this->useHeadings = $useHeadings;
        $this->filename = $filename;
        $this->handle = fopen($filename, "r");
        if($this->handle === false){
            exit('Script was canceled, file cannot be read'); 
        }
        if($useHeadings){
            $this->getHeadings();
        }
    }

    public function swapHeadings(array $headings){
        return $this->headings = str_replace(array_keys($headings), array_values($headings), $this->headings);
    }
    
    public function getHeadings(){
        $this->next();
        $this->headings = $this->currentRow;
        return $this->headings;
    }

    public function current() {
        $this->counter++;
        if(count($this->headings)){
            return array_combine($this->headings, $this->currentRow);
        }
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
        if(count($this->headings)){
            $this->next();
        }
        $this->next();
        $this->counter = 0;
    }

    public function valid() {
        if(feof($this->handle)){
            fclose($this->handle);
            return false;
        }
        return true;
    }

}
