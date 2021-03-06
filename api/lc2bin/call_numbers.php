<?php
/**
 * @file
 * @author Andrew Bair
 * @date 27SEPT2012
 *
 * A function set used to convert a human-readable LC call number to a binary string.
 *
 */

include_once "LC_Converter_lib.php";
include_once "../base64_lib.php";
include_once "../lcparse/parseLibrary.php";
include_once "../../header_include.php";

$JSONparsed = urldecode($_GET["call_number"]);

$JSONparsedArr = parseToAssocArray($JSONparsed);

$binret = LC2Bin($JSONparsedArr["lcNum"]);

$result = ($JSONparsedArr["allow"]=="true") ? "SUCCESS" : "ERROR";

echo json_encode(array("book_tag"=>bin2base64($binret['Bin']), "call_number"=>$JSONparsed, "parsed_call_number"=>$JSONparsedArr["lcNum"],
						"parser_feedback"=>$JSONparsedArr["arrOfConflicts"], "result"=>$result));

 ?>