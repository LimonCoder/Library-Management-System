<?php require_once('include/header.php') ?>

<?php



    if (isset($_POST['Submit'])){

        $input_bookerrors = array();



        if (!empty($_POST['bookname'])){
            $bookname = trim($_POST['bookname']);
        }else{
            $input_bookerrors['emptybookname'] = "*";
        }

        if (!empty($_FILES['bookimage']['name'])){

            $bookimageextension = explode(".",$_FILES['bookimage']['name']);
            $imageextention = ["jpg","png","jpeg","jfif"];


            if (in_array(end( $bookimageextension),$imageextention)){

                $bookimagename = rand(111111,999999).".".end( $bookimageextension);
                $booktmpname = $_FILES['bookimage']['tmp_name'];

            }else{
                $input_bookerrors['invalidtypebookiamge'] = "Only jpg, png file allow";
            }


        }else{
            $input_bookerrors['emptybookiamge'] = "*";
        }

        if (!empty($_POST['publicationname'])){
            $publicationname = trim($_POST['publicationname']);
        }else{
            $input_bookerrors['emptypublicationname'] = "*";
        }
        // Author name.......
        if (!empty($_POST['authorname'])){
            $authorname = trim($_POST['authorname']);
        }else{
            $input_bookerrors['emptyauthorname'] = "*";
        }
        // book price........
        if (!empty($_POST['bookprice'])){
            $bookprice = trim($_POST['bookprice']);
        }else{
            $input_bookerrors['emptybookprice'] = "*";
        }
        // Date Validation
        if (!empty($_POST['date'])){
            $purchasedate = $_POST['date'];
        }else{
            $input_bookerrors['emptydate'] = "*";
        }
        // Book Quantity.....
        if(!empty($_POST['bookquantity'])){
            if (is_numeric($_POST['bookquantity'])){
                    $bookquantity = $_POST['bookquantity'];
            }else{
                $input_bookerrors['bookquantityinvaild'] = "Book Quantity must be number";
            }

        }else{
            $input_bookerrors['emptybookquantity'] = "*";
        }
        // Availble Quantity.....
        if(!empty($_POST['avaiblequantity'])){
            if (is_numeric($_POST['avaiblequantity'])){
                $avaiablequantity = $_POST['avaiblequantity'];
            }else{
                $input_bookerrors['avaiblequantityinvalid'] = "Avaiable Quantity must be number";
            }

        }else{
            $input_bookerrors['emptyavaiblequantity'] = "*";
        }










    }
?>


<div class="row ">
    <!--WIDGETBOX Main Box-->


    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-content">
                <div class="row justify-content-center">
                    <div class="col-md-12 p-3">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <h3 class="mb-lg text-center bg-info " style="padding: 16px 0px; font-family: 'Times New Roman'"><strong><i class="fa fa-book" style="margin-right: 5px"></i>ADD BOOK</strong></h3>
                            <div class="form-group">
                                <label for="bookname" class="col-sm-4 control-label">Book Name
                                    <?php
                                    if (isset($input_bookerrors['emptybookname'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptybookname'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">

                                    <input type="text" class="form-control" id="bookname" placeholder="Book Name " name="bookname" value="<?= isset($bookname)?$bookname:''?>">

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-4 control-label">Book Image
                                    <?php
                                    if (isset($input_bookerrors['emptybookiamge'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptybookiamge'].'</span>';

                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="image" name="bookimage" value="<?= isset($bookimagename)?$bookimagename:''?>">

                                </div>
                                <?php
                                if (isset($input_bookerrors['invalidtypebookiamge'])){
                                    echo '<h6 class="text-center" style="color: red">'.$input_bookerrors['invalidtypebookiamge'].'</h6>';
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="publicationname" class="col-sm-4 control-label">Publication Name
                                    <?php
                                    if (isset($input_bookerrors['emptypublicationname'])){

                                        echo '<span style="color: red">'.$input_bookerrors['emptypublicationname'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="publicationname" placeholder="Publication Name" name="publicationname" value="<?= isset($publicationname)?$publicationname:''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="authorname" class="col-sm-4 control-label">Author Name
                                    <?php
                                    if (isset($input_bookerrors['emptyauthorname'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptyauthorname'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="authorname" placeholder="Author Name" name="authorname" value="<?= isset($authorname)?$authorname:''?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bookprice" class="col-sm-4 control-label">Book Price
                                    <?php
                                    if (isset($input_bookerrors['emptybookprice'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptybookprice'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="bookprice" placeholder="Book Price" name="bookprice" value="<?= isset($bookprice)?$bookprice:''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="purchasedate" class="col-sm-4 control-label">Purchase Date
                                    <?php
                                    if (isset($input_bookerrors['emptydate'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptydate'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="phurshacedate"  name="date" placeholder="MM/DD/YYYY" type="text" value="<?= isset($purchasedate)?$purchasedate:''?>"/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="bookquantity" class="col-sm-4 control-label">Book Quantity
                                    <?php
                                    if (isset($input_bookerrors['emptybookquantity'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptybookquantity'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="bookquantity" placeholder="Book Quantity" name="bookquantity" value="<?= isset($bookquantity)?$bookquantity:''?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="availbequantity" class="col-sm-4 control-label">Available Quantity
                                    <?php
                                    if (isset($input_bookerrors['emptyavaiblequantity'])){
                                        echo '<span style="color: red">'.$input_bookerrors['emptyavaiblequantity'].'</span>';
                                    }
                                    ?>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="availbequantity" placeholder="Available Quantity" name="avaiblequantity" value="<?= isset($avaiablequantity)?$avaiablequantity:''?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-center">
                                    <button type="submit" name="Submit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                    <button   onclick="location.reload()" class="btn btn-warning" style="margin-left: 4px"><i class="fa fa-undo"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--WIDGETBOX Main Box-->





</div>



<?php require_once('include/footer.php') ?>


<?php

if(isset($input_bookerrors)) {
    if (count($input_bookerrors) == 0) {
        $liberianusername = $_SESSION['UserName'];

        $query = "INSERT INTO books  VALUES (NULL, '$bookname', '$bookimagename', '$authorname', '$publicationname', '$purchasedate', '$bookprice', '$bookquantity', '$avaiablequantity', '$liberianusername', NULL)";

        $succes = mysqli_query($con, $query);

        if ($succes) {
            move_uploaded_file($booktmpname, "../serverimages/" . $bookimagename);
            ?>
            <script type="text/javascript">
                booksavepoup()
            </script>
        <?php } else { ?>
            <script type="text/javascript">
                bookfaildpoup()
            </script>
        <?php }


    }
}

?>

