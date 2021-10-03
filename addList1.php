<?php

require 'assets/db/setup.php';
require 'HTTPReq.php';
/*
$userName = $_GET['accountName'];
$listid = $_GET['listid'];
$itemNames = $_GET['itemnames'];
$userPic = $_GET['profilepic'];*/
//$itemImages = $_GET['itemimages'];
/*
$array1 = explode(",", $itemNames);
//$array2 = explode(",", $itemImages);
$numList = count($array1);
*/
function getImageIMDb($name) {
	$url = "https://v2.sg.media-imdb.com/suggests/".substr($name, 0, 1)."/".$name.".json";
	$response = HTTPRequester::HTTPGet($url, array("t" => $name), 'Asda2');
	$arrayx = explode('"',$response);
	for ($x = 0; $x < count($arrayx); $x++) {
		if (strpos($arrayx[$x], 'jpg')) { 
			$imageLink = $arrayx[$x];
			break;
		}
	}
	return $imageLink;
}

echo getImage("darkestminds");

//echo substr(getImage("bodyguard"), $first, $second - $first);
/*
print_r(substr($arrayi[1], 2, array_search('@._V1_.jpg', $arrayi)));
echo (str_replace(array('"i":["','"'),'', $arrayi[10]));*/
/*
$checkQuery = "SELECT * FROM listid WHERE id = '$listid'";
$sockets = db::getInstance()->get_result2($checkQuery);
if ($sockets->num_rows > 0) {
	$fullLink = str_replace($listid, generateRandomString(16), $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	header("Location: addList.php?listid=".$full);
}
$checkQuery2 = "SELECT * FROM listid WHERE id = '$listid'";
$sockets2 = db::getInstance()->get_result2($checkQuery2);
if ($sockets2->num_rows > 0) {
	$fullLink = str_replace($listid, generateRandomString(16), $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	header("Location: addList.php?listid=".$full);
}
*/
/*
$createTable = "INSERT INTO `listid` (`id`, `num`, `shares`) VALUES ('$listid', '$numList', 1)";

$wisherID = db::getInstance()->dbquery($createTable);

for ($x = 0; $x < $numList; $x++) {
	$getImageFunction = getImage($array1[$x]);
	$createTable = "INSERT INTO `listitems` (`id`, `user`,`uimage`,`name`, `image`) VALUES ('$listid', '$userName','$userPic','$array1[$x]', '$getImageFunction')";

	$wisherID = db::getInstance()->dbquery($createTable);
}

header("Location: list.php?listid=".$listid);*/
?>

<style>
.loading-element {
  position: absolute;
  top: calc(50% - 32px);
  left: calc(50% - 32px);
  width: 64px;
  height: 64px;
  border-radius: 50%;
  perspective: 800px;
}
.loading-element .inner {
  position: absolute;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.loading-element .inner.one {
  left: 0%;
  top: 0%;
  animation: rotate-one 1s linear infinite;
  border-bottom: 3px solid #666;
}
.loading-element .inner.two {
  right: 0%;
  top: 0%;
  animation: rotate-two 1s linear infinite;
  border-right: 3px solid #666;
}
.loading-element .inner.three {
  right: 0%;
  bottom: 0%;
  animation: rotate-three 1s linear infinite;
  border-top: 3px solid #666;
}
.loading-element.white .inner.one {
  border-bottom: 3px solid #efeffa;
}
.loading-element.white .inner.two {
  border-right: 3px solid #efeffa;
}
.loading-element.white .inner.three {
  border-top: 3px solid #efeffa;
}
@keyframes rotate-one {
  0% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}
@keyframes rotate-two {
  0% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}
@keyframes rotate-three {
  0% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}

</style>

<div class="loading-element">
  <div class="inner one"></div>
  <div class="inner two"></div>
  <div class="inner three"></div>
</div>