<?php
use PHPUnit\Framework\TestCase;
use FNVi\CSVTools\CSVParser;
/**
 * Description of CSVParserTest
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class CSVParserTest extends TestCase{
    
    public function testOpenFileNoHeadings(){
        return new CSVParser('tests/noHeadings.csv');
    }
    
    /**
     * @depends testOpenFileNoHeadings
     * @param CSVParser $parser
     */
    public function testReadFileNoHeadings(CSVParser $parser){
        $total = [];
        $index = 1;
        foreach($parser as $row){
            $expected = array_fill(0, $index, $index);
            $this->assertEquals($expected, $row);
            $index++;
            $total["expected"][] = $expected;
            $total["actual"][] = $row;
        }
        $this->assertEquals($total["expected"], $total["actual"]);
    }
    
    public function testOpenFileHasHeadings(){
        return new CSVParser('tests/hasHeadings.csv',true);
    }
    
    /**
     * @depends testOpenFileHasHeadings
     * @param CSVParser $parser
     * @return CSVParser
     */
    public function testHasHeadings(CSVParser $parser){
        $expected = $this->hasHeadingsExpected();
        $this->assertEquals(array_keys($expected[0]), $parser->getHeadings());
        return $parser;
    }
    
    /**
     * @depends testHasHeadings
     * @param CSVParser $parser
     */
    public function testReadFileHasHeadings($parser){
        $expected = $this->hasHeadingsExpected();
        $index = 0;
        $actualResult = [];
        foreach($parser as $actual){
            $this->assertEquals($expected[$index], $actual);
            $index++;
            $actualResult[] = $actual;
        }
        $this->assertEquals($expected, $actualResult);
    }
    
    
    public function hasHeadingsExpected(){
        $headings = ["Heading 1","Heading 2","Heading 3","Heading 4","Heading 5"];
        $out = [];
        for($i = 1; $i < 3 ;$i++){
            $row = [];
            foreach($headings as $k=>$val){
                $row[$val] = "R$i"."C".($k+1);
            }
            $out[] = $row;
        }
        return $out;
    }
    
    public function testOpenFileJsonHeadings(){
        return new CSVParser('tests/jsonHeadings.csv', true, true);
    }
    
    /**
     * @depends testOpenFileJsonHeadings
     * @param CSVParser $parser
     */
    public function testReadFileJsonHeadings($parser){
        $expected = $this->hasHeadingsExpected();
        $index = 0;
        $actualResult = [];
        foreach($parser as $actual){
            $this->assertEquals($expected[$index], $actual);
            $index++;
            $actualResult[] = $actual;
        }
        $this->assertEquals($expected, $actualResult);
    }
    
    public function expectedJsonHeadings(){
        $out = [];
        for($i = 1; $i < 3; $i++){
            $out[] = [
                "normal"=>"R$i"."C1",
                "dot"=>[
                    "notation"=>"R$i"."C2",
                    "notation2"=>"R$i"."C3"
                ]
            ];
        }
    }
}
