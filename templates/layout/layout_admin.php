<?php
$cakeDescription = 'Abiram Sauchalaya';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Abiram Sauchalaya
    </title>
    <link href="../../admin_template/images/logo/logo-main.png" type="image/x-icon" rel="icon" />
    <link href="../../admin_template/images/logo/logo-main.png" type="image/x-icon" rel="shortcut icon" />



    <?= $this->fetch('meta') ?>

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css(['/admin_template/css/bootstrap.min', '/admin_template/style', '/admin_template/css/responsive', '/admin_template/css/colors', '/admin_template/css/bootstrap-select', '/admin_template/css/perfect-scrollbar', "/admin_template/css/custom"]); ?>
    <?= $this->fetch('scriptTop'); ?>
    <!-- jQuery -->



</head>

<body class="dashboard dashboard_1">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="full_container">
        <div class="inner_container">
            <?= $this->element('header') ?>
            <!-- /top navigation -->

            <!-- page content -->
            <!-- /page content -->
            <div id="content">
                <?= $this->element("topnav") ?>
                <div class="midde_cont">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
                <?= $this->element('footer') ?>
            </div>

            <!-- footer content -->

            <!-- /footer content -->
        </div>
    </div>
</body>



<?= $this->Html->script(['/admin_template/js/jquery.min.js','/admin_template/js/popper.min', '/admin_template/js/bootstrap.min', '/admin_template/js/animate', '/admin_template/js/bootstrap-select', '/admin_template/js/owl.carousel', '/admin_template/js/Chart.min', '/admin_template/js/Chart.bundle.min', '/admin_template/js/utils', '/admin_template/js/analyser', '/admin_template/js/perfect-scrollbar.min', '/admin_template/js/custom.min', '/admin_template/js/chart_custom_style1', '/admin_template/js/activity.js', "/admin_template/js/custom"]); ?>
<?= $this->fetch('scriptBottom'); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#state_id').change(function() {
            var stateId = $(this).val();



            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Bookings", "action" => "get_district"]); ?>', // URL to your action
                type: 'GET',
                data: {
                    stateId: stateId
                }, // Pass the selected country ID
                dataType: 'json',
                success: function(response) {




                    var citiesDropdown = $('#district_id');
                    citiesDropdown.empty(); // Clear existing options

                    citiesDropdown.append($('<option>', {
                        value: '',
                        text: 'Select an option'
                    }));

                    // Populate the cities dropdown with the response data
                    $.each(response.chembers, function(id, name) {
                        citiesDropdown.append($('<option>', {
                            value: id,
                            text: name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#district_id').change(function() {
            var stateId = $(this).val();



            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Bookings", "action" => "get_area"]); ?>', // URL to your action
                type: 'GET',
                data: {
                    stateId: stateId
                }, // Pass the selected country ID
                dataType: 'json',
                success: function(response) {




                    var citiesDropdown = $('#area_id');
                    citiesDropdown.empty(); // Clear existing options

                    citiesDropdown.append($('<option>', {
                        value: '',
                        text: 'Select an option'
                    }));

                    // Populate the cities dropdown with the response data
                    $.each(response.chembers, function(id, name) {
                        citiesDropdown.append($('<option>', {
                            value: id,
                            text: name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#area_id').change(function() {
            var stateId = $(this).val();



            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Bookings", "action" => "get_postoffice"]); ?>', // URL to your action
                type: 'GET',
                data: {
                    stateId: stateId
                }, // Pass the selected country ID
                dataType: 'json',
                success: function(response) {




                    var citiesDropdown = $('#post_office_id');
                    citiesDropdown.empty(); // Clear existing options

                    citiesDropdown.append($('<option>', {
                        value: '',
                        text: 'Select an option'
                    }));

                    // Populate the cities dropdown with the response data
                    $.each(response.chembers, function(id, name) {
                        citiesDropdown.append($('<option>', {
                            value: id,
                            text: name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#post_office_id').change(function() {
            var stateId = $(this).val();



            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Bookings", "action" => "get_pincode"]); ?>', // URL to your action
                type: 'GET',
                data: {
                    stateId: stateId
                }, // Pass the selected country ID
                dataType: 'json',
                success: function(response) {

                    console.log(response);


                    if (response) {
                        // Assuming `response` is the pincode
                        $('#pincode').val(response.chembers);
                    } else {
                        alert('Pincode not found');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#pipe_id').change(function() {
            var chamber_id = document.getElementById('chamber_id').value;
            var tank_id = document.getElementById('tank_id').value;
            var pipe_id = document.getElementById('pipe_id').value;





            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Bookings", "action" => "get_amount"]); ?>', // URL to your action
                type: 'GET',
                data: {
                    chamber_id: chamber_id,
                    tank_id: tank_id,
                    pipe_id: pipe_id
                }, // Pass the selected country ID
                dataType: 'json',
                success: function(response) {




                    if (response) {
                        // Assuming `response` is the pincode
                        $('#amount').val(response.chembers);
                    } else {
                        alert('Pincode not found');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#user_type').change(function() {
            var user_type = $(this).val();

            $.ajax({
                url: '<?php echo $this->Url->build(["controller" => "Payments", "action" => "get_user"]); ?>',
                type: 'GET',
                data: {
                    user_type: user_type
                }, // Pass the selected user type
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Debug the response structure

                    // Check if response.users is valid
                    if (response && response.users) {
                        var citiesDropdown = $('#driver1');

                        console.log("Dropdown element:", citiesDropdown);

                        citiesDropdown.empty(); // Clear existing options

                        // Add a default "Select an option"
                        citiesDropdown.append($('<option>', {
                            value: '',
                            text: 'Select an option'
                        }));

                        // Populate the dropdown with response data
                        $.each(response.users, function(id, name) {

                            citiesDropdown.append($('<option>', {
                                value: id,
                                text: name
                            }));
                        });
                    } else {
                        console.error('No users data found in response.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        });
    });
</script>

</html>