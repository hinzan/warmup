<?php
$sampleXMLContents       = file_get_contents("sample-reaxml.xml");
$sampleXMLContentsObject = new SimpleXMLElement($sampleXMLContents);

$excerciseFiveArrayPreProcess = xmlToArray($sampleXMLContentsObject);
$excerciseFiveAnswer          = getUniqueIDandType($excerciseFiveArrayPreProcess);

print_r($excerciseFiveAnswer);

function xmlToArray(SimpleXMLElement $xml): array
{
    $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
        $nodes = $xml->children();
        if (0 === $nodes->count()) {
            $collection['value'] = strval($xml);
            return $collection;
        }
        foreach ($nodes as $nodeName => $nodeValue) {
            if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
                $collection[$nodeName] = $parser($nodeValue);
                continue;
            }
            $collection[$nodeName][] = $parser($nodeValue);
        }

        return $collection;
    };

    return [
        $xml->getName() => $parser($xml)
    ];
}


function getUniqueIDandType($excerciseFiveArrayPreProcess){
   foreach($excerciseFiveArrayPreProcess['propertyList'] as $parentkey=>$propertyTypeArray){
      foreach($propertyTypeArray as $uniqureIDSArray){   
         $uniqueIDS = $uniqureIDSArray['uniqueID']['value'];
         if($uniqueIDS >0)
            $uniqureIDSA[$uniqueIDS] = $parentkey;
      }
   }
   return $uniqureIDSA;
}


/* Response 
Array
(
    [1P3115] => commercial
    [1P0116] => commercial
    [1P0117] => commercial
    [1P0006] => commercial
    [1P0120] => business
    [1P0121] => business
    [1P0122] => business
    [1P0123] => holidayRental
    [2631096] => holidayRental
)
*/



?>