<?php

$id_prov = $_POST['prov_id'];
$sql_kota = DB::table('provinsi')->join('kota', 'provinsi.id_provinsi', '=', 'kota.id_provinsi')->where('kota.id_provinsi', $id_prov)->get();

echo '<option value="null" selected="selected"> -- Pilih --</option>';
                
while($b1 = mysqli_fetch_array($sql_kota)){
    echo "<option value='".$b1[0]."'>".$b1[2]."</option>";
}
                

?>