<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Supplier Source Voucher</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="<?= base_url() ?>Source_voucher/act">
                                <input type="hidden" name="id_source_voucher" id="id_source_voucher" value="0"/>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone" id="phone">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" class="form-control"></textarea>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = $this->uri->segment(3);
                                if (!empty($results)) {
                                    foreach ($results as $data) {
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $data->name; ?></td>
                                            <td><?= $data->phone; ?></td>
                                            <td><?= $data->email; ?></td>
                                            <td><button class="btn btn-primary" onclick="edtSource_voucher('<?= $data->id_source_voucher ?>', '<?= $data->name ?>','<?= $data->phone ?>','<?= $data->email ?>','<?= $data->address ?>')"><i class="fa fa-edit"></i></button></td>
                                            <td><button class="btn btn-danger" onclick="deleteSource_voucher('<?= $data->id_source_voucher ?>')"><i class="fa fa-remove"></i></button></td>
                                        </tr>
                                    <?php
                                    }
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
        function edtSource_voucher(id, name,phone,email,address) {
            $("#id_source_voucher").val(id);
            $("#name").val(name);
            $("#phone").val(phone);
            $("#email").val(email);
            $("#address").html(address);
            $("#submit").html('Update');
        }
        function deleteSource_voucher(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Source_voucher/deleteSource_voucher',
                    data: "id=" + id
                }).done(function (data) {
                    alert(data);
                    window.location.href = '<?= base_url() ?>Source_voucher';
                });
            } else {

            }
        }
    </script>
</div>