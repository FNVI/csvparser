<?php
use PHPUnit\Framework\TestCase;
use FNVi\CSVTools\CSVMaker;

/**
 * Description of CSVMakerTest
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVMakerTests extends TestCase {

    public function testCreateFile() {
        $filename = "CSVActual.csv";

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
     * @depends createFile
     * @param string $filename
     */
    public function testFileContent($filename) {
        $this->assertFileEquals($filename, "CSVExpected.csv");
    }

    public function tearDown() {
        unlink("CSVActual.csv");
        parent::tearDown();
    }
}
