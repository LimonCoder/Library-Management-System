<?php

require_once('include/header.php') ?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->

    <div class="col-sm-8 col-md-8">
        <div class="panel ">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <h3 class="mb-lg ">Books Information Upload</h3>
                            <div class="form-group" style="margin-left: 5px">
                                <input type="file"  id="excel">
                            </div>
                            <div class="form-group " style="margin-left: 5px">
                                <a href="" type="submit" class="btn btn-danger" >Check your file</a>
                                <a href="" type="submit" class="btn btn-primary" style="margin-left: 6px">Upload</a>
                            </div>
                            <div class="form-group " style="margin-left: 5px">
                                <a href="../assets/format/format.xlsx" >Download  format.xlxs</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>
