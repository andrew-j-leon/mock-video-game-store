<?php

final class ComponentGenerator {
    
    private function __construct() {}
    
    /**
     * 
     * @param array<string, array<string>) $columns : An associate array where "keys" (strings) are table
     *                                                headers & "values" (arrays of strings) is the row data
     *                                                corresponding to each header. 
     *                         
     *                                                Rows are displayed in the order of they appear in the "value".
     *                                                
     *                                                Each "value" must have the SAME LENGTH.
     *                         
     *                                                Ex: {"Names" => {"Abby", "Angel", "Gracy"}} will display a single
     *                                                column table with header "Names" and rows "Abby", "Angel", and "Gracy"
     *                                                (in that order from top to bottom):
     *                         
     *                                                              Names
     *                                                              -----
     *                                                              Abby
     *                                                              Angel
     *                                                              Gracy
     *                                                  
     * @param array<string> $classes                : Specifies any classes that apply to the entire table. Default is
     *                                                no classes (i.e. an empty array).
     * 
     * @return string : A string representing a table HTML.
     */
    public static function makeTable(array $columns, array $classes = []) : string {
        // Convert the list of classes ($classes) to a single string.
        $classesStr = "";
        foreach($classes as $class) {
            $classesStr .= $class . " ";
        }
        $classesStr = rtrim($classesStr);
        
        $result = "<table class=\"$classesStr\">";
        $result .= ComponentGenerator::makeTableHeader($columns);
        $result .= ComponentGenerator::makeTableBody($columns);
        $result .= "</table>";
        
        return $result;
    }
    
    /**
     * 
     * @param array $columns : Contains the table data.
     * @return string : The HTML <thead> of the associated $columns data.
     */
    private static function makeTableHeader(array $columns) : string {
        $result = "<thead><tr>";
        
        foreach ($columns as $thead => $rows) {
            $result .= "<th>$thead</th>";
        }
        
        return $result . "</tr></thead>";
    }
    
    /**
     * 
     * @param array $columns : Contains the table data. 
     * @return string : The HTML <tbody> of the associated $columns data.
     */
    private static function makeTableBody(array $columns) : string {
        $result = "<tbody>";
        
        
        $firstKey = array_key_first($columns);
        
        // Each entry in this array will hold a <tr>
        //      - Index 0 = First row
        //      - Index 1 = Second row
        //      - Etc.
        $rowTags = array_fill(0, count($columns[$firstKey]), "<tr>");
        
        // Add the <td> tags to each entry in $rowTags
        foreach ($columns as $thead => $rows) {
            $rowTagIndex = 0;
            foreach ($rows as $rowData) {
                $rowTags[$rowTagIndex] .= "<td>$rowData</td>";
                $rowTagIndex += 1;
            }
        }
        
        // Adds the closing </tr> tag to each entry in $rowTags,
        // then adds each <tr> to $result.
        for ($i = 0; $i < count($rowTags); $i++) {
            $rowTags[$i] .= "</tr>";
            $result .= $rowTags[$i];
        }
        
        // Add the closing </tbody> tag to $result and return it.
        return $result . "</tbody>";
    }
    
    
    
}


?>