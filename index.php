<?php
$alternatifs = array();
$kriteria = array();

$r = array();

$kriteria[] = 'C1';
$kriteria[] = 'C2';
$kriteria[] = 'C3';
$kriteria[] = 'C4';
$kriteria[] = 'C5';

$w = array(0.3, 0.25, 0.1, 0.3, 0.05);

$alternatifs[] = array('Ibrahim', 5, 7.5, 6, 2.5, 5);
$alternatifs[] = array('Rina', 7.5, 5, 2, 10, 10);
$alternatifs[] = array('Ika', 2.5, 5, 4, 5, 7.5);
$alternatifs[] = array('Dito', 10, 2.5, 8, 7.5, 10);

$index_alternatif = 0;
foreach ($alternatifs as $alternatif) {
    $index_kriteria = 1;
    foreach ($kriteria as $kr) {
        if($kr == 'C2'){
            $r[$index_alternatif][$index_kriteria] = round(min(array_column($alternatifs, $index_kriteria)) / $alternatifs[$index_alternatif][$index_kriteria], 2);
        }elseif ($kr == 'C1' || $kr == 'C3' || $kr == 'C4' || $kr == 'C5') {
            $r[$index_alternatif][$index_kriteria] = round($alternatifs[$index_alternatif][$index_kriteria] / max(array_column($alternatifs, $index_kriteria)), 2);
            
        }$index_kriteria++;
    }
    $index_alternatif++;
}

echo "<pre>";
print_r($r);
echo "</pre>";

$index_alternatif = 0;
foreach ($alternatifs as $alternatif) {
    $index_w = 0;
    $index_r = 1;
    $v = 0;
    foreach ($kriteria as $kr) {
        $v += $w[$index_w] * $r[$index_alternatif][$index_r];
        $index_r++;
        $index_w++;
    }
    $nilai_v[$index_alternatif]['alternatif'] = $alternatif[0];
    $nilai_v[$index_alternatif]['nilai'] = $v;
    $index_alternatif++;
}

echo "<pre>";
print_r($nilai_v);
echo "</pre>";

usort($nilai_v, function($a,$b){
    return $a['nilai'] <=> $b['nilai'];
});

$rank = 1;
echo "<h4>Rekomendasi penerimaan beasiswa</h4>";
echo "<br>";
foreach (array_reverse($nilai_v) as $v) {
    echo 'Ranking '.$rank.' '.$v['alternatif'].' dengan nilai '.$v['nilai'].'<br>';
    $rank++;
}
?>