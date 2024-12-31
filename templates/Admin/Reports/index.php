<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "program"]); ?>" style="color:white;">
                            <div class="card-body">Payment Report</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "gst"]); ?>" style="color:white;">
                            <div class="card-body">GST Payment Report</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "driverduepayment"]); ?>" style="color:white;">
                            <div class="card-body">Driver Due Payment List Report</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "driverpaidpayment"]); ?>" style="color:white;">
                            <div class="card-body">Driver Paid Payment List Report</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "helperduepayment"]); ?>" style="color:white;">
                            <div class="card-body">Helper Due Payment List Report</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white_shd full margin_bottom_30">

                    <div class="card bg-primary text-white text-center" style="height:100px;">
                        <a href="<?php echo $this->Url->build(["controller" => "Reports", "action" => "helperpaidpayment"]); ?>" style="color:white;">
                            <div class="card-body">Helper Paid Payment List Report</div>
                        </a>
                    </div>
                </div>
            </div>






        </div>
    </div>