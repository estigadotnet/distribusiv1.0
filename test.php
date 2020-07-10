<?php

$angka=array(4,4,5,3,3,3,3,4,2,3,5,4,2,2,2,2);
$no=0;

echo "<table border=1>";
for($i=0; $i <3; $i++){
      echo "<tr>";
      for($j=0; $j<5; $j++){
            echo "<td>";
            $angkabaru[$i][$j]=$angka[$no];
            $angkabaru1[$j][$i]=$angkabaru[$i][$j];
            echo $angkabaru[$i][$j];
            echo "</td>";
            $no++;
      }
}
echo "</table>";

echo "Nilai Maksimal berdasarakan kolom: <br>";
for($i=0; $i < 5; $i++){
      $maks[$i]=max($angkabaru1 [$i]);
      echo $maks[$i];
}

$angka=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23);
for ($i = 0; $i < 23; $i++) {
	$angka[$i] = number_format(rand(0,200)/100,2);
}
$angka[$i] = 0;
$no=0;

echo "<table border=1>";
for($i=0; $i <8; $i++){
      echo "<tr>";
      for($j=0; $j<3; $j++){
            echo "<td>";
            $angkabaru[$i][$j]=$angka[$no];
            $angkabaru1[$j][$i]=$angkabaru[$i][$j];
            echo $angkabaru[$i][$j];
            echo "</td>";
            $no++;
      }
}
echo "</table>";

//echo "Nilai Maksimal berdasarakan kolom: <br>";
echo "Nilai Minimal berdasarakan kolom: <br>";
for($i=0; $i < 3; $i++){
      //$maks[$i]=max($angkabaru1 [$i]);
	  //echo $maks[$i];
	  //$min[$i]=min($angkabaru1 [$i]);
	  $min[$i]=min(array_filter($angkabaru1 [$i],create_function("$var", "return '$var != 0';")));
      echo $min[$i];
}

function fNot0($var) {
	if ($var != 0) {
		return $var;
	}
}

echo "<pre>";
print_r(min(array_filter($angka, "fNot0")));
echo "</pre>";
?>