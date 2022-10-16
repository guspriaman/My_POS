<?= form_open('suplier/hapusbanyak', ['class' => 'formhapusbanyak']) ?>


<p>
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash-o"></i>Hapus Banyak
    </button>
</p>                
                
                
                <table class="table table-bordered table-striped" id="datasuplier">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="centangSemua">
                            </th>
                            <th>No</th>
                            <th>No BP</th>
                            <th>Nama Suplier</th>
                            <th>Tempat lahir</th>
                            <th>Tgl Lahir</th>
                            <th>JenKel</th>
                            <th>Prodi</th> 
                            <th>action</th>
                        </tr>
                    </thead>


                    
                    <tbody>
                        
                </table>  
                <?= form_close(); ?>
                <script>

                function  listdatasuplier(){
                    var table = $('#datasuplier').DataTable({
                      "processing": true,
                      "serverSide": true,
                      "order" : [],
                      "ajax" :{
                        "url" : "<?= site_url('suplier/listdata')?>",
                        "type": "POST"
                      },

                      "columnDefs": [{
                        "targets" : 0,
                        
                      },

                      {
                        "targets": 1,
                        "orderable": false,
                      },

                    ],
                    })
                }
                $(document).ready(function () {
                    // $('#datasuplier').DataTable();
                    listdatasuplier();

                    $('#centangSemua').click(function(e) {

                        if($(this).is(':checked')){

                            $('.centangNobp').prop('checked', true);
                        } else {
                            $('.centangNobp').prop('checked', false);
                            
                        } 
                    });

                    $('.formhapusbanyak').submit(function(e) {
                        e.preventDefault();
                        let jmldata = $('.centangNobp:checked');
                        if (jmldata.length === 0) {
                            swal.fire({
                                icon: 'error',
                                title: 'perhatian',
                                text: 'Maaf Silakan pilih data yang mau dihapus !'
                            });
                        } else {
                            Swal.fire({
                            title: 'Hapus Data Banyak',
                            text: `Yakin data suplier dihapus sebanyak ${jmldata.length} Data ?`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Tidak!'
                            }).then((result) => {
                                if(result.value)  {
                                    $.ajax ({
                                        type: "post",
                                        url : $(this). attr('action'),
                                        data: $(this).serialize(),
                                        dataType: "json",
                                        success: function(response) {
                                            if(response.sukses) {
                                                datasuplier();
                                            }
                                            
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                        alert (xhr.status + "\n" + xhr.responseText + "\n" +
                                        thrownError);
                                        }
                                    });
                                }
                            })
                        }
                    })

                });



                function edit(nobp) {
                    $.ajax({
                        type: "post",
                        url : "<?= site_url('suplier/formedit') ?>",
                        data : {
                            nobp: nobp
                        },
                        dataType: "json",
                        success: function(response) {
                            if(response.sukses){
                                $('.viewmodal').html(response.sukses).show();
                                $('#modaledit').modal('show');
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert (xhr.status + "\n" + xhr.responseText + "\n" +
                                thrownError);
                        }

                    })
                }


                function hapus(nobp) 
                {
                    Swal.fire({
                        title: 'Hapus',
                        text:`Yakin ingin hapus data suplier dengan nobp ${nobp} ?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelmButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                $.ajax({
                                    type: "post",
                                    url : "<?= site_url('suplier/hapus') ?>",
                                    data : {
                                        nobp: nobp
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        if(response.sukses){
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Berhasil',
                                                    text : response.sukses
                                                });
                                                datasuplier();
                                            
                                        }
                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        alert (xhr.status + "\n" + xhr.responseText + "\n" +
                                            thrownError);
                                    }

                                })
                            )
                        }
                    })
                }


                function upload(nobp) {
                    $.ajax({
                        type: "post",
                        url : "<?= site_url('suplier/formupload') ?>",
                        data : {
                            nobp: nobp
                        },
                        dataType: "json",
                        success: function(response) {
                            if(response.sukses){
                                $('.viewmodal').html(response.sukses).show();
                                $('#modalupload').modal('show');
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert (xhr.status + "\n" + xhr.responseText + "\n" +
                                thrownError);
                        }

                    })
                }

                </script>





