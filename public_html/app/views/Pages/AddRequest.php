<?php
$newUser = new Users();
$user = $newUser->FindCurrentUser('users', $_SESSION['master_id']);
?>
<style type="text/css">
    textarea {
        width: 100%;
        background-color: transparent;
        border: 1px solid #999;
        border-radius: 0;
        line-height: 23px;
        padding: 10px 20px;
        font-size: 14px;
        color: #444;
        margin-bottom: 15px;
    }

    .cartype_radio {
        width: 100%;
    }

    .cartype_radio li {
        width: auto;
        float: left;
        padding: 14px;
        margin: 10px 15px;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.15);
        border-radius: 5px;
    }

    .cartype_radio li:hover {
        box-shadow: 5px 5px 2px #2dc1d685;
    }

    .cartype_radio li img {
        width: 70px;
    }

    .car_active {
        box-shadow: 5px 5px 2px #2dc1d685 !important;
    }
</style>
<link rel="stylesheet" href="<?= PROOT ?>css/price_range.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- Include the daterangepicker library -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="dashboard-main-inner">
    <div class="row">
        <div class="col-12">
            <div class="page-breadcrumb-content mb-40">
                <h1>Add New Request</h1>
            </div>
        </div>
    </div>
    <div class="dashboard-overview">
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="profile-applications mb-50">
                    <div class="profile-applications-main-block">
                        <div class="profile-applications-form">
                            <form action="#" class="checkout-form">
                                <div class="row row-40">
                                    <div class="col-lg-12">
                                        <!-- Billing Address -->
                                        <div id="billing-form" class="mb-10">
                                            <div class="row">
                                                <div class="col-md-12 col-12 mb-20">
                                                    <label>Select Car Type*</label>
                                                    <ul class="cartype_radio">
                                                        <?php
                                                        $cartypes = $newUser->FindByAll('vehicle_type');
                                                        if ($cartypes) {
                                                            foreach ($cartypes as $cartype) {
                                                                ?>
                                                                <li title="<?php echo $cartype->vt_name; ?>">
                                                                    <img src="<?php echo 'https://admin.broombids.com/' . $cartype->img; ?>">
                                                                    <input type="radio" value="<?php echo $cartype->id; ?>" name="vcartype" style="display: none;">
                                                                    <p style="text-align: center;"><?php echo $cartype->vt_name; ?></p>
                                                                </li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 mb-20">
                                                    <label>Enter Title Eg : I want to rent Car*</label>
                                                    <input type="text" placeholder="Enter Title (I want to rent Car)" id="ptitle" name="ptitle">
                                                </div>
                                                <div class="col-md-6 mb-20">
                                                    <label>Select Location*</label>
                                                    <select class="nice-select" id="plocation" name="plocation">
                                                        <option value="">Select Location</option>
                                                        <?php
                                                        $locations = $newUser->FindByAll('locationsadmin');
                                                        if ($locations) {
                                                            foreach ($locations as $location) {
                                                                echo '<option value="' . $location->id . '">' . $location->lname . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <label>From Date*</label>
                                                    <input type="text" placeholder="From Date" id="fromdate" name="fromdate">
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <label>To Date*</label>
                                                    <input type="text" placeholder="To Date" id="todate" name="todate">
                                                </div>
                                                <script>
                                                    // Initialize daterangepicker with the desired date format
                                                    $('#fromdate').daterangepicker({
                                                        singleDatePicker: true,
                                                        minYear: 1901,
                                                        autoApply: true,
                                                        drops: "up",
                                                        maxYear: parseInt(moment().format('YYYY'), 10),
                                                        locale: {
                                                            // format: 'DD/MM/YYYY'
                                                            format: 'MM/DD/YYYY'
                                                        }
                                                    }, function(start, end, label) {});

                                                    $('#todate').daterangepicker({
                                                        singleDatePicker: true,
                                                        minYear: 1901,
                                                        autoApply: true,
                                                        drops: "up",
                                                        maxYear: parseInt(moment().format('YYYY'), 10),
                                                        locale: {
                                                            // format: 'DD/MM/YYYY'
                                                            format: 'MM/DD/YYYY'
                                                        }
                                                    }, function(start, end, label) {});
                                                </script>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Price Range (25 EURO to 1000 EURO)</label>
                                                </div>
                                                <div class="wrapper" style="padding: 0px 20px; width: 100%">
                                                    
                                                    <div class="extra-controls form-inline">
                                                        <div class="form-group">
                                                            <input type="number" id="rangrfrom" name="rangrfrom" class="js-input-from form-control" value="0" />
                                                            <input type="number" id="rangrto" name="rangrto" class="js-input-to form-control" value="0" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-20" style="margin-top: 20px;">
                                                    <label>Special Remark</label>
                                                    <textarea rows="3" placeholder="Special Remark." id="remark" name="remark"></textarea>
                                                </div>
                                                <div id="err" class="col-md-12 col-12"></div>
                                                <div class="col-md-12 col-12">
                                                    <button type="button" class="ht-btn black-btn mt-40" id="postrequirement">Place Offer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                        </div>
                                    </div>
