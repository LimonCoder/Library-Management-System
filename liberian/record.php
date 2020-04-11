<?php

require_once('include/header.php') ?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->




<div class="col-sm-12 col-md-8">
                    <h4 class="section-subtitle">Books Issue & Returns Report</h4>
                    <div class="panel " style="padding-bottom: 57px;">
                        <div class="panel-content" style="padding: 16px 0px 0px 91px;">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <form action="print.php" class="form-inline" method="POST">
                                        <h5 class="mb-lg "></h5>
                                        <div class="form-group">
                                        	<div><label for="from">From :</label>
                                            <?php

                                                if (isset($_SESSION['emptyfromdate'])){
                                                    echo '<span style="color:red;">'.$_SESSION['emptyfromdate'].'</span>';
                                                     unset($_SESSION['emptyfromdate']);
                                                }
                                               
                                            ?>

                                            </div>
                                        	<input type="text" class="form-control" style="margin: 4px;"  id="from" name="from" placeholder="From" readonly>
                                        </div>
                                        <div class="form-group">
                                        	<div><label for="to">To :</label>
                                                <?php
                                                if (isset($_SESSION['emptytodate'])){
                                                    echo '<span style="color:red;">'.$_SESSION['emptytodate'].'</span>';
                                                    unset($_SESSION['emptytodate']);
                                                }
                                                
                                                ?>
                                            </div>
                                        	<input type="text" class="form-control" style="margin: 4px;" id="to" name="to" placeholder="To" readonly>
                                        </div>
                                        <div class="form-group">
                                        	<br>
                                            <button type="submit" name="searchdate" value="searchdate" class="btn btn-primary " style="margin: 4px; border-radius: 3px;">Send</button>
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


<script>
    $(function() {
        $( "#from" ).datepicker({
            dateFormat: 'dd-mm-yy',
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            dateFormat: 'dd-mm-yy',
            defaultDate: "+1w",
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
    </script>