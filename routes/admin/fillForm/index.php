<?php require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$Street = $dataCard->getStreet($_POST["select_district"]);

$district = $_POST["district"];
$street = $_POST["street"];
$numberHouse = $_POST["house"];
$houseType = $_POST["house_type"];
$elevator = $_POST["elevator"];
$countFloor = $_POST["count_floor"];
$HouseType = $dataCard->getTypes();

if(isset($_POST["addDistrict"])){
    $newDist = $dataCard->insertDist($_POST["district_name"]);
}
if(isset($_POST["addStreet"])){
    $newStreet = $dataCard->insertStreet($_POST["select_district"],$_POST["street_name"]);
}
if(isset($_POST["addHouseNum"])){
    $HouseNum = $dataCard->insertHouseNum($_POST["select_street"],$_POST["house_number"],$_POST["houseType"],$_POST["count_floor"],$_POST["elevator"]);
}
if(isset($_POST["addFloor"])){
    $addCountFloor = $dataCard->insertTypeInfo($_POST["addType"]);

}







require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/admin/fillForm/index.view.php";