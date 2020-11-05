C:\xampp\htdocs\SOAL UAS\MPSO\mpso_151811513050\pages\admin\mpso_exam_scheduling_js\penjadwalan_mpso\insertview.php

<div class="form-group">
<label>Fakultas</label>
<select class="form-control" name="fakultas" id="fakultas" required>
     <option value="null" selected="selected">-- Pilih --</option>
                <?php
        $r1 = mysqli_query($dbhandle,"select * from fakultas") or die (mysql_error($dbhandle));
        while($b1 = mysqli_fetch_array($r1)){
            echo "<option value='".$b1[0]."'>".$b1[1]."</option>";
        }
                ?>

</select><br>
</div>

<div class="form-group">
<label>Program Studi</label>
<select class="form-control" name="prodi" id="prodi" onchange="getPd();" required>
     <option value="null" selected="selected">-- Pilih --</option>
             <?php
        //  $r2 = mysqli_query($dbhandle,"select * from prodi ") or die (mysql_error($dbhandle));
        //  while($b1 = mysqli_fetch_array($r2)){
        //      echo "<option value='".$b1[0]."'>".$b1[2]."</option>";
        // }
        ?>
                

</select><br>
</div>

	
    <script type="text/javascript">
        $(document).ready(function() {
            $('#fakultas').change(function(){
            var fak = $(this).val();
                $.ajax({
                    url:'dataload.php',
                    type:'POST',
                    data: 'fak_id='+fak,
                    success:function(response){
                        $('#prodi').html(response);
                    }
                });
            });
         });
    </script> 


DATALOAD.PHP
<?php
include('../../../../include/koneksi_old.php');

$kodefakultas = $_POST['fak_id'];

$SQL_prodi = mysqli_query($dbhandle,"select * from prodi where KODEFAKULTAS = '$kodefakultas' ") or die (mysqli_error($dbhandle));

echo '<option value="null" selected="selected"> -- Pilih --</option>';
                
while($b1 = mysqli_fetch_array($SQL_prodi)){
    echo "<option value='".$b1[0]."'>".$b1[2]."</option>";
}
                

?>



<!-- <script type="text/javascript">
  $(document).ready(function() {
      $('#id_provinsi').change(function(){
      var prov = $(this).val();
          $.ajax({
              url:'{{ url("/dataload")}}',
              type:'POST',
              data: 'prov_id='+prov,
              success:function(response){
                  $('#id_kota').html(response);
              }
          });
      });
  });
</script> 
 -->