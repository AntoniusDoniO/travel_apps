<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sub District</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="<?= base_url() ?>Subdistricr/act">
                                <input type="hidden" name="id_sub_district" id="id_sub_district" value="0"/>
                                <div class="form-group">
                                    <label>Province</label>
                                    <select id="id_district" name="id_district" class="form-control">
                                        <?php 
                                        $resultDistrict=$this->ModelDistrict->getListDistrict('','*');
                                        foreach ($resultDistrict->result() as $District) {?>
                                        <option value="<?= $District->id_district; ?>"><?= $District->district_name;?></option>
                                       <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>District</label>
                                    <input class="form-control" type="text" name="sub_district_name" id="sub_district_name">
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
                                    <th>District</th>
                                    <th>Sub District</th>
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
                                        <td><?= $data->district_name ?></td>
                                        <td><?= $data->sub_district_name ?></td>
                                        <td><button class="btn btn-primary" onclick="edtDistrict('<?= $data->id_sub_district ?>', '<?= $data->sub_district_name ?>','<?= $data->id_district; ?>')"><i class="fa fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger" onclick="deleteSubDistrict('<?= $data->id_sub_district ?>')"><i class="fa fa-remove"></i></button></td>
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
        function edtDistrict(id, name,id_district) {
            $("#id_district").val(id_district);
            $("#id_sub_district").val(id);
            $("#sub_district_name").val(name);
            $("#submit").html('Update');
        }
        function deleteSubDistrict(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Subdistricr/deleteSubDistrict',
                    data: "id="+id
                }).done(function (data) {
                    alert(data);
                    window.location.href='<?= base_url()?>Subdistricr';
                });
            } else {

            }
        }
    </script>
</div>