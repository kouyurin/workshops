<?php
require_once "Apartment.php";

$apartment = new Apartment("アパート志木", 31, 30000);
echo $apartment->createSpec();
