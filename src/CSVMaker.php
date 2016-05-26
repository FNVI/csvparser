<?php

namespace FNVi\CSVTools;

/**
 * This class will be used to make CSV files.
 * A little less useful/required than the Parser tool, but helps keep a standard for writing them
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVMaker {
    
    private $handle;
    private $json;
    private $headings;
    
    public function __construct($filename, $json = true, $store = false) {
        $this->json = $json;
        $this->handle = fopen($store ? $filename : 'php://output', 'w');
        
        if(!$store){
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $filename . ".csv" . '";');
        }
    }
    
    public function setHeadings(array $headings){
        $this->headings = $headings;
        return $this->writeLine($headings);
    }
    
    public function writeLine(array $record){
        return fputcsv($this->handle, $record);
    }
    
}
