<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Province</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="<?= base_url() ?>Province/act">
                                <input type="hidden" name="id_province" id="id_province" value="0"/>
                                <div class="form-group">
                                    <label>Province</label>
                                    <input class="form-control" type="text" name="province_name" id="province_name">
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
                                    <th>Province</th>
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
                                        <td><?= $data->province_name ?></td>
                                        <td><button class="btn btn-primary" onclick="edtProvince('<?= $data->id_province ?>', '<?= $data->province_name ?>')"><i class="fa fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger" onclick="deleteProvince('<?= $data->id_province ?>')"><i class="fa fa-remove"></i></button></td>
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
        function edtProvince(id, name) {
            $("#id_province").val(id);
            $("#province_name").val(name);
            $("#submit").html('Update');
        }
        function deleteProvince(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Province/deleteProvince',
                    data: "id="+id
                }).done(function (data) {
                    alert(data);
                    window.location.href='<?= base_url()?>Province';
                });
            } else {

            }
        }
    </script>
</div>