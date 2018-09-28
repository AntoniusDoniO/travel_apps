<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #googleMap {
        width:  100%;
        height: 300px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #googleMap #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hotel</h1>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--<form role="form" method="POST" action="<?= base_url() ?>Hotel/act" enctype="multipart/form-data">-->
                            <input type="hidden" name="id_hotel" id="id_hotel" value="0"/>
                            <input type="hidden" name="lat" id="lat" value=""/>
                            <input type="hidden" name="long" id="long" value=""/>
                            <input type="hidden" name="rnd" id="rnd" value=""/>

                            <div class="form-group">
                                <label>Hotel</label>
                                <input class="form-control" type="text" name="hotel_name" id="hotel_name">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input class="form-control" type="text" name="primary_pic" id="primary_pic">
                                <div style="cursor: pointer;background:white;" onclick="image_upload('primary_pic', 'primary_pic');">Browse</div>
                            </div>
                            <div class="form-group">
                                <label>Sub District</label>
                                <select id="id_sub_district" name="id_sub_district" class="form-control">
                                    <?php
                                    $resultSubDistrict = $this->ModelSubdistricr->getListSubdistricr('', '*');
                                    foreach ($resultSubDistrict->result() as $SubDistrict) {
                                        ?>
                                        <option value="<?= $SubDistrict->id_sub_district ?>"><?= $SubDistrict->sub_district_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Map</label>
                                <input id="pac-input" class="form-control" type="text" placeholder="Search Box">
                                <div id="googleMap" style="width:100%;height:300px;"></div>
                            </div>
<!--                            <div class="form-group col-lg-12">
                                <div id="room_content" >
                                    <div class="form-group col-lg-1">
                                        <label>Room's Type</label>
                                    </div>
                                    <div class="form-group col-lg-3">

                                        <select id="id_room_type_1" name="id_room_type_1" class="form-control">
                                            <?php
                                            $resultRoom_type = $this->ModelRoom_type->getListRoom_type('', 'id_room_type,name_type');
                                            foreach ($resultRoom_type->result() as $Room_type) {
                                                ?>
                                                <option value="<?= $Room_type->id_room_type; ?>"><?= $Room_type->name_type; ?></option>
                                            <?php }
                                            ?>  
                                        </select>

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input class="form-control" type="text" name="name_fasiliity_1" id="name_fasiliity_1">
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <button id="add" class="btn btn-primary" onclick="add_type('1');">ADD</button>
                                    <button id="add" class="btn btn-primary">Delete</button>
                                </div>
                            </div>-->
                            <div class="form-group input-group">
                                <button class="btn btn-primary" id="submit" onclick="saved();">Save</button>
                            </div>
                            <!--</form>-->
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
                                    <th>Hotel</th>
                                    <th>Phone</th>
                                    <th>Address</th>
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
                                            <td><?= $data->hotel_name ?></td>
                                            <td><?= $data->phone ?></td>
                                            <td><?= $data->address ?></td>
                                            <td><button class="btn btn-primary" onclick="edtHotel('<?= $data->id_hotel ?>', '<?= $data->hotel_name ?>', '<?= $data->address ?>', '<?= $data->phone ?>', '<?= $data->id_sub_district ?>', '<?= $data->primary_pic; ?>', '<?= $data->lat ?>', '<?= $data->lng ?>')"><i class="fa fa-edit"></i></button></td>
                                            <td><button class="btn btn-danger" onclick="deleteHotel('<?= $data->id_hotel ?>')"><i class="fa fa-remove"></i></button></td>
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
//        function randomUint32() {
//            if (window && window.crypto && window.crypto.getRandomValues && Uint32Array) {
//                var o = new Uint32Array(1);
//                window.crypto.getRandomValues(o);
//                return o[0];
//            } else {
//                console.warn('Falling back to pseudo-random client seed');
//                return Math.floor(Math.random() * Math.pow(2, 32));
//            }
//        }
//        $(document).ready(function () {
//            rnd = randomUint32();
//            $("#rnd").val(rnd);
//        });
//        function add_type(id) {
//            $("#room_content").append('<div id="room_content" >');
//        }
        function edtHotel(id, name, address, phone, id_sub_district, primary_pic, lat, long) {
            $("#id_hotel").val(id);
            $("#hotel_name").val(name);
            $("#address").val(address);
            $("#phone").val(phone);
            $("#id_sub_district").val(id_sub_district);
            $("#primary_pic").val(primary_pic);
            $("#lat").val(lat);
            $("#long").val(long);
            $("#submit").html('Update');
        }
        function deleteHotel(id) {
            if (confirm("Are You Sure To Delete this Data?")) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Hotel/deleteHotel',
                    data: "id=" + id
                }).done(function (data) {
                    alert(data);
                    window.location.href = '<?= base_url() ?>Hotel';
                });
            } else {

            }
        }
        function saved() {
            var formData = new FormData();
            formData.append('id_hotel', $("#id_hotel").val());
            formData.append('hotel_name', $("#hotel_name").val());
            formData.append('address', $("#address").val());
            formData.append('phone', $("#phone").val());
            formData.append('id_sub_district', $("#id_sub_district").val());
            formData.append('primary_pic', $("#primary_pic").val());
            formData.append('lat', $("#lat").val());
            formData.append('long', $("#long").val());
            $.ajax({
                url: '<?php echo base_url(); ?>Hotel/act',
                type: "POST",
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false
            }).done(function (data) {
                alert(data);
                window.location.href = '<?= base_url() ?>Hotel';
            });
        }
        function image_upload(field, thumb) {

            $('#dialog').remove();
            $('#wrapper').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;">\n\
                <iframe src="<?php echo base_url(); ?>filemanager/?field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
            $('#dialog').dialog({
                title: 'Travel-Apps File Manager',
                close: function (event, ui) {
                    if ($('#' + field).attr('value')) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>filemanager/image?image=' + encodeURIComponent($('#' + field).attr('value')),
                            dataType: 'text',
                            success: function (data) {
//                    $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                            }
                        });
                    }
                },
                bgiframe: false,
                width: 600,
                height: 400,
                resizable: false,
                modal: false
            });
        }
    </script>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:, 110.370529
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                center: {lat: -7.797068, lng: 110.370529},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    $("#lat").val(place.geometry.location.lat());
                    $("#long").val(place.geometry.location.lng());
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlaYxP1zfd1Uf_ldQdZSdaxRio7Q8Wtb0&libraries=places&callback=initAutocomplete"></script>
</div>