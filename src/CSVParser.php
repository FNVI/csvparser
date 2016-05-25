<?php

namespace FNVi\CSVParser;

/**
 * Provides Iterator access to a CSV file.
 * Includes options to use the files headers to create JSON objects, allows for headings to be swapped and the use of dot notation in headings to structure the data internally
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
    private $dotnotation;
    
    /**
     * Creates the object
     * 
     * @param string $filename The path to the file
     * @param boolean $useHeadings Option to use the headings (if true)
     * @param boolean $json Option to use dot notation (if true)
     */
    public function __construct($filename, $useHeadings = false, $json = false) {
        $this->useHeadings = $useHeadings;
        $this->dotnotation = $json;
        $this->filename = $filename;
        $this->handle = fopen($filename, "r");
        if($this->handle === false){
            exit('Script was canceled, file cannot be read'); 
        }
        if($useHeadings){
            $this->getHeadings();
        }
    }

    /**
     * Swaps any of the headings from the file to a preferred name.
     * Can be used one at a time or multiple values at once.
     * 
     * @param array $headings An associative array where the current headings are keys and new headings are values
     * @return array The new headings
     */
    public function swapHeadings(array $headings){
        return $this->headings = str_replace(array_keys($headings), array_values($headings), $this->headings);
    }
    
    /**
     * Sets whether dot notation will be used or not
     * @param boolean $bool
     */
    public function useDotNotation($bool = true){
        $this->dotnotation = $bool;
    }
    
    /**
     * Takes an associative array, and if any of the keys have dot notation
     * it returns them as a php multi dimensional array representation of a 
     * JSON object
     * 
     * @param array $array
     * @return array
     */
    protected function dotNotation(array $array)
    {
        $output = array();
        foreach($array as $k=>$v)
        {
            $temp = &$output;
            foreach(explode(".",$k) as $step)
            {
                $temp = &$temp[$step];
            }
            $temp = $v;
        }
        return $output;
    }
    
    /**
     * Gets the headings from the first line of the file being read
     * @return array
     */
    public function getHeadings(){
        if($this->headings === []){
            $this->next();
            $this->headings = $this->currentRow;
        }
        return $this->headings;
    }

    /**
     * Returns the current line of the CSV file, making use of the settings
     * to modify the structure
     * @return array
     */
    public function current() {
        $this->counter++;
        if(count($this->headings)){
            $row = array_combine($this->headings, $this->currentRow);
            return $this->dotnotation ? $this->dotnotation($row) : $row;
        }
        return $this->currentRow;
    }

    /**
     * Gets the current key (current row in csv file)
     * @return integer
     */
    public function key() {
        return $this->counter;
    }

    /**
     * Reads the next row from the CSV file
     * @return array
     */
    public function next() {
        return $this->currentRow = fgetcsv($this->handle);
    }

    /**
     * Rewinds back to the beginniing of the file
     */
    public function rewind() {
        rewind($this->handle);
        if(count($this->headings)){
            $this->next();
        }
        $this->next();
        $this->counter = 0;
    }

    /**
     * Checks for the end of the file
     * @return boolean
     */
    public function valid() {
        if(feof($this->handle)){
            fclose($this->handle);
            return false;
        }
        return true;
    }

}
