<?php
function xml2json($xml_string,$onlyEncode=false)
{
$fileContents = str_replace(array("\n", "\r", "\t"), '', $xml_string);

$fileContents = trim(str_replace('"', "'", $fileContents));

$simpleXml = simplexml_load_string($fileContents);

$json = json_encode($simpleXml);
$array = json_decode($json,TRUE); // convert the JSON-encoded string to a PHP variable

return ($onlyEncode?$json :$array);
}

function escribir($nombreArchivo, $texto) {
	$fp = fopen($nombreArchivo, "w+");
	fwrite($fp, $texto);
	fclose($fp);
}

function xmlObjToArr($obj) { 
        $namespace = $obj->getDocNamespaces(true); 
        $namespace[NULL] = NULL; 
        
        $children = array(); 
        $attributes = array(); 
        $name = strtolower((string)$obj->getName()); 
        
        $text = trim((string)$obj); 
        if( strlen($text) <= 0 ) { 
            $text = NULL; 
        } 
        
        // get info for all namespaces 
        if(is_object($obj)) { 
            foreach( $namespace as $ns=>$nsUrl ) { 
                // atributes 
                $objAttributes = $obj->attributes($ns, true); 
                foreach( $objAttributes as $attributeName => $attributeValue ) { 
                    $attribName = strtolower(trim((string)$attributeName)); 
                    $attribVal = trim((string)$attributeValue); 
                    if (!empty($ns)) { 
                        $attribName = $ns . ':' . $attribName; 
                    } 
                    $attributes[$attribName] = $attribVal; 
                } 
                
                // children 
                $objChildren = $obj->children($ns, true); 
                foreach( $objChildren as $childName=>$child ) { 
                    $childName = strtolower((string)$childName); 
                    if( !empty($ns) ) { 
                        $childName = $ns.':'.$childName; 
                    } 
                    $children[$childName][] = xmlObjToArr($child); 
                } 
            } 
        } 
        
        return array( 
            'name'=>$name, 
            'text'=>$text, 
            'attributes'=>$attributes, 
            'children'=>$children 
        ); 
    } 

    function getNode($element, $nodeName)
    {
    	//var_dump($element);
    	$element = $element['children'];
    	//echo "<hr>";
    	//var_dump($element);
    	foreach ($element as $one => $vOne) {
    		//echo "<br>".$one."<br>";
    		if($one==$nodeName)
    		{
    			//var_dump($vOne[0]);
    			if( isset($vOne[0]['text']) &&
    				$vOne[0]['text']!='NULL' &&
    				$vOne[0]['text']!=NULL)
    			{
    				return $vOne[0]['text'];
    			}else{
    				return $vOne[0]['attributes']['url'];
    			}
    		}
    	}
    	return null;
    }
?>