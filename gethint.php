<?php
// Array with subjects
$a[] = "Buy";
$a[] = "Sell";
$a[] = "Can't buy books";
$a[] = "Can't sell books";
$a[] = "Payment";
$a[] = "Login issue";
$a[] = "Registration issue";
$a[] = "Can't edit details";
$a[] = "Profile";
$a[] = "Bug";
$a[] = "Error";
$a[] = "Suggestion";
$a[] = "Filtering issue";
$a[] = "Cart issue";
$a[] = "Contact";
$a[] = "Website down";
$a[] = "Crash";
$a[] = "Enquiry";
$a[] = "Help";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $subject) {
    if (stristr($q, substr($subject, 0, $len))) {
      if ($hint === "") {
        $hint = $subject;
      } else {
        $hint .= ", $subject";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>