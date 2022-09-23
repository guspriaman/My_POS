<?= $this->extend('layout/menu'); ?>
<?= $this->section('isi'); ?>


  <script src="<?php echo base_url()?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">




<div class="content-wrapper">
    <div class="content-header ">
        <div class="container-fluid ">
            <div class="s mb-2 bt-10 ">
                <div class="col-sm-3 bt-3">
                    <h1 class="m-0 ">Data Suplier</h1>
                    <button class="btn btn-primary btn-flat my-3 tomboltambah">
                        <i class="fas fa-user-plus"></i> Tambal Data
                    </button>
                </div>
                <p class="card text viewdata"></p>
                

                               
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display:none ;"></div>
<script>
function datasuplier(){
    $.ajax({
        url: "<?= site_url('suplier/ambildata')?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert (xhr.status + "\n" + xhr.responseText + "\n" +
            thrownError);
        }
    });
}   
$(document).ready(function () {
    datasuplier();
    $('.tomboltambah'). click(function(e) {
        e.preventDefault();
        $.ajax({
        url: "<?= site_url('suplier/formtambah')?>",
        dataType: "json",
        success: function(response) {
            $('.viewmodal').html(response.data).show();

            $('#modaltambah').modal('show');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert (xhr.status + "\n" + xhr.responseText + "\n" +
            thrownError);
        }
    });
    })
    

 

    $('#datasuplier').DataTable();
});
</script>

<?= $this->endSection(''); ?>

