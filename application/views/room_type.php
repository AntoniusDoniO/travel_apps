<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Room's Type</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="<?= base_url() ?>Room_type/act">
                                <input type="hidden" name="id_room_type" id="id_room_type" value="0"/>
                                <div class="form-group">
                                    <label>Room's Type</label>
                                    <input class="form-control" type="text" name="name_type" id="name_type">
                                </div>
                                <div class="form-group input-group">
                                    <button class="btn btn-primary" id="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room's Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = $this->uri->segment(3);
                                 if( !empty($results) ) {
                                foreach ($results as $data) {
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data->name_type ?></td>
                                        <td><button class="btn btn-primary" onclick="edtRoom_type('<?= $data->id_room_type ?>', '<?= $data->name_type ?>')"><i class="fa fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger" onclick="deleteRoom_type('<?= $data->id_room_type ?>')"><i class="fa fa-remove"></i></button></td>
                                    </tr>
                                <?php }
                                 }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!--Tampilkan pagination-->
            <?php echo $links; ?>
        </div>
    </div>

    <!-- /.row -->
    <script>
        function edtRoom_type(id, name) {
            $("#id_room_type").val(id);
            $("#name_type").val(name);
            $("#submit").html('Update');
        }
        function deleteRoom_type(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Room_type/deleteRoom_type',
                    data: "id="+id
                }).done(function (data) {
                    alert(data);
                    window.location.href='<?= base_url()?>Room_type';
                });
            } else {

            }
        }
    </script>
</div>