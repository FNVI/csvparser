<?php
use PHPUnit\Framework\TestCase;
use FNVi\CSVTools\CSVMaker;
/**
 * Description of NachoTest
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVMakerTest extends TestCase{
    
    public function testCreateFile() {
        $filename = "tests/CSVActual.csv";

        $maker = new CSVMaker($filename, true, true);

        $headings = [];
        for ($h = 1; $h <= 5; $h++) {
            $headings[] = "Heading $h";
        }
        $maker->writeLine($headings);

        for ($r = 1; $r <= 20; $r++) {
            $row = [];
            for ($c = 1; $c <= 5; $c++) {
                $row[] = "Data $c:$r";
            }
            $maker->writeLine($row);
        }
        $this->assertFileExists($filename);
        return $filename;
    }

    /**
     * @depends testCreateFile
     * @param string $filename
     */
    public function testFileContent($filename) {
        $this->assertFileEquals($filename, "tests/CSVExpected.csv");
    }

    public static function tearDownAfterClass()
    {
        unlink("tests/CSVActual.csv");
    }
}
