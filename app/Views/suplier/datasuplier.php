<table class="table table-bordered table-striped" id="datasuplier">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No BP</th>
                            <th>Nama Suplier</th>
                            <th>Tempat lahir</th>
                            <th>Tgl Lahir</th>
                            <th>JenKel</th>
                            <th>action</th>
                        </tr>
                    </thead>


                    
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php 
                        foreach ($tampildata as $s) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $s['nobp'] ?></td>
                                <td><?= $s['nama'] ?></td>
                                <td><?= $s['taplahir'] ?></td>
                                <td><?= $s['tgllahir'] ?></td>
                                <td><?= $s['jenkel'] ?></td>
                                <td>
                                    <button href="" class="btn btn-info">Create</button>
                                    <button href="" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>  

                <script>
                    $(document).ready(function () {
                        $('datasuplier').Datatable();
                    });
                </script>