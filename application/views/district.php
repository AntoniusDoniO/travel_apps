<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">District</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="<?= base_url() ?>District/act">
                                <input type="hidden" name="id_district" id="id_district" value="0"/>
                                <div class="form-group">
                                    <label>Province</label>
                                    <select id="id_province" name="id_province" class="form-control">
                                        <?php 
                                        $resultProvince=$this->ModelProvince->getListProvince('','*');
                                        foreach ($resultProvince->result() as $Province) {?>
                                        <option value="<?= $Province->id_province; ?>"><?= $Province->province_name;?></option>
                                       <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>District</label>
                                    <input class="form-control" type="text" name="district_name" id="district_name">
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
                                        <td><button class="btn btn-primary" onclick="edtDistrict('<?= $data->id_district ?>', '<?= $data->district_name ?>','<?= $data->id_province; ?>')"><i class="fa fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger" onclick="deleteDistrict('<?= $data->id_district ?>')"><i class="fa fa-remove"></i></button></td>
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
        function edtDistrict(id, name,id_province) {
            $("#id_district").val(id);
            $("#id_province").val(id_province);
            $("#district_name").val(name);
            $("#submit").html('Update');
        }
        function deleteDistrict(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>District/deleteDistrict',
                    data: "id="+id
                }).done(function (data) {
                    alert(data);
                    window.location.href='<?= base_url()?>District';
                });
            } else {

            }
        }
    </script>
</div>