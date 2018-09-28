<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Voucher</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="POST" action="<?= base_url() ?>Voucher/act">
                                    <input type="hidden" name="id_voucer" id="id_voucer" value="0"/>
                                    <div class="form-group">
                                        <label>No Voucer</label>
                                        <input class="form-control" type="text" name="no_voucer" id="no_voucer">
                                    </div>
                                    <div class="form-group">
                                        <label>Source</label>
                                        <select id="id_source" name="id_source" class="form-control">
                                            <?php
                                            $resultSource_voucher = $this->ModelSource_voucher->getListSource_voucher('', 'id_source_voucher,name');
                                            foreach ($resultSource_voucher->result() as $Source_voucher) {
                                                ?>
                                                <option value="<?= $Source_voucher->id_source_voucher; ?>"><?= $Source_voucher->name; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Room Type's</label>
                                        <select id="id_room_type" name="id_room_type" class="form-control">
                                            <?php
                                            $resultRoom_type = $this->ModelRoom_type->getListRoom_type('', 'id_room_type,name_type');
                                            foreach ($resultRoom_type->result() as $Room_type) {
                                                ?>
                                                <option value="<?= $Room_type->id_room_type; ?>"><?= $Room_type->name_type; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hotel</label>
                                        <select id="id_hotel" name="id_hotel" class="form-control">
                                            <?php
                                            $resultHotel = $this->ModelHotel->getListHotel('', 'id_hotel,hotel_name');
                                            foreach ($resultHotel->result() as $Hotel) {
                                                ?>
                                                <option value="<?= $Hotel->id_hotel; ?>"><?= $Hotel->hotel_name; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="from-group col-lg-6"><label>Price</label></div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input class="form-control" type="text" name="price" id="price">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Start Date</label>
                                        <input class="form-control" type="text" name="start_date" id="start_date">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>End Date</label>
                                        <input class="form-control" type="text" name="end_date" id="end_date">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Expired Date</label>
                                        <input class="form-control" type="text" name="expired_date" id="expired_date">
                                    </div>
                                    <div class="clearfix"></div>
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
                                        <th>No Voucher</th>
                                        <th>Hotel</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                         <th>Expired Date</th>
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
                                                <td><?= $data->no_voucer ?></td>
                                                <td><?= $data->hotel_name ?></td>
                                                <td>Rp. <?= number_format($data->price, 0, ".", ",") ?></td>
                                                <td><?= dates_convert($data->start_date); ?> s/d <?= dates_convert($data->end_date);?></td>
                                                <td><?= dates_convert($data->expired_date); ?></td>
                                                <td><button class="btn btn-primary" onclick="edtDistrict('<?= $data->id_voucer ?>', '<?= $data->no_voucer ?>', '<?= $data->id_source; ?>', '<?= $data->id_room_type; ?>', '<?= $data->id_hotel; ?>', '<?= $data->price; ?>','<?= $data->start_date;?>','<?= $data->end_date;?>','<?= $data->expired_date;?>')"><i class="fa fa-edit"></i></button></td>
                                                <td><button class="btn btn-danger" onclick="deleteSubDistrict('<?= $data->id_voucer ?>')"><i class="fa fa-remove"></i></button></td>
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
            function edtDistrict(id_voucer, no_voucer, id_source,id_room_type,id_hotel,price,start_date,end_date,expired_date) {
                $("#id_voucer").val(id_voucer);
                $("#no_voucer").val(no_voucer);
                $("#id_source").val(id_source);
                $("#id_room_type").val(id_room_type);
                $("#id_hotel").val(id_hotel);
                $("#price").val(price);
                $("#start_date").val(start_date);
                $("#end_date").val(end_date);
                $("#expired_date").val(expired_date);
                $("#submit").html('Update');
            }
            function deleteSubDistrict(id) {
                if (confirm("Are You Sure To Delete this Data?")) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>Voucher/deleteVoucher',
                        data: "id=" + id
                    }).done(function (data) {
                        alert(data);
                        window.location.href = '<?= base_url() ?>Voucher';
                    });
                } else {

                }
            }
            $(function () {
                var fromDate = $("#start_date").datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    minDate: new Date(),
                    onSelect: function (selectedDate) {
                        var instance = $(this).data("datepicker");
                        var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                        date.setDate(date.getDate() + 1);
                        toDate.datepicker("option", "minDate", date);
                    }
                });

                var toDate = $("#end_date").datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    onSelect: function (selectedDate) {
                        var instance = $(this).data("datepicker");
                        var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                        date.setDate(date.getDate());
                        expiredDate.datepicker("option", "minDate", date);
                    }
                });
               var expiredDate= $("#expired_date").datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd'
                   
                });
            });
            
        </script>
    </div>
</div>