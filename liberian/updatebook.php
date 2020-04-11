<?php
require_once('include/header.php') ;

$sid = base64_decode($_GET['updateid']);

$results = mysqli_query($con,"SELECT * FROM books WHERE id = $sid ");
$row = mysqli_fetch_assoc($results);




?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->
    <div class="col-sm-8 col-md-5" style="margin-top: 15px; padding: 16px 4px; float: right">
        <h4 class="section-subtitle"></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        <form action="" method="POST" id="fromvalid" enctype="multipart/form-data" onsubmit="updatefromvalid(); return false"  >

                        <div class="form-group" style="margin: 10px;">
                            <h5><label for="BookPrice">Book Image :</label></h5>
                            <div class="text-center" style="margin-bottom: 20px"> <img id="uploadPreview" src="<?= (isset($row['book_image']))? "../serverimages/".$row['book_image']:"" ?>" style="width: 300px; height: 430px;" /></div>

                        </div>
                        <div class="form-group" style="padding-bottom: 20px; ">
                            <label for="imgup" class="col-sm-4 control-label" style="margin-top: 5px">Change Image :</label>
                            <div class="col-sm-8">
                                <input id="bookimage" type="file" name="bookimage" onchange="PreviewImage();" style="margin-top: 12px" />
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-7" style="float: left">

                    <h4 class="section-subtitle"><b>Update Book</b> </h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="bookname">Book Name :</label>
                                            <span style="color: red" id="emptybookname"></span>
                                            <input type="text" class="form-control" id="bookname"  placeholder="Book Name :" name="bookname"  value="<?=(isset($row['book_name']))?$row['book_name']:""?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="Publicationname">Publication Name</label>
                                            <span style="color: red" id="emptypublicationname"></span>
                                            <input type="text" class="form-control" id="publicationname" placeholder="Publication Name :" name="publicationname" value="<?= (isset($row['book_publicationname']))?$row['book_publicationname']:"" ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="authorname">Author Name :</label>

                                            <span style="color: red" id="emptyauthorname"></span>
                                            <input type="text" class="form-control" id="authorname" placeholder="Author Name:" name="authorname" value="<?= (isset($row['book_authorname']))?$row['book_authorname']:"" ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="BookPrice">Book Price</label>

                                            <span style="color: red" id="emptybookPrice"></span>
                                            <input type="text" class="form-control" id="BookPrice" placeholder="Book Price" name="bookprice" value="<?= (isset($row['book_price']))?$row['book_price']:"" ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Purdate">Purchase Date</label>

                                            <span style="color: red" id="emptybookdata"></span>
                                            <input type="text" class="form-control" id="Purdate" placeholder="DD-MM-YYYY"  name="Purchasedate" value="<?= (isset($row['book_purchase_date']))?date("d-m-Y",strtotime($row['book_purchase_date'])):"" ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="bookquantity">Book Quantity</label>

                                            <span style="color: red" id="emptybookquantity"></span>
                                            <input type="text" class="form-control" id="bookquantity" placeholder="Book Quantity"  name="bookquantity" value="<?= (isset($row['book_qty']))?$row['book_qty']:"" ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="avaiablequantity">Avaiable Quantity</label>

                                            <span style="color:red" id="emptyavaiblequantity"></span>
                                            <input type="text" class="form-control" id="avaiablequantity" placeholder="Avaiable Quantity"  name="avaiablequantity" value="<?= (isset($row['avaible_qty']))?$row['avaible_qty']:"" ?>">
                                        </div>


                                        <div class="row ">
                                            <div class="form-group text-center">
                                                <button type="submit" class=" btn btn-primary" id="updateid" value="<?=$row['id']?>">Update Book</button>
                                            </div>
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

<script type="text/javascript">


    function updatefromvalid(){

        var dateReg = /^\d{2}([./-])\d{2}\1\d{4}$/;
        var id = document.getElementById("updateid").value;




        if( document.getElementById("bookname").value.length == 0)
        {
            document.getElementById("emptybookname").innerHTML = "*";
            document.getElementById("bookname").style.borderColor = "red";
        }else{
            document.getElementById("emptybookname").innerHTML = "";
            document.getElementById("bookname").style.borderColor = "";
            var bookname = document.getElementById("bookname").value;
        }



        if(document.getElementById("publicationname").value.length == 0) {
            document.getElementById("emptypublicationname").innerHTML = "*";
            document.getElementById("publicationname").style.borderColor = "red";
        }else{
            document.getElementById("emptypublicationname").innerHTML = "";
            document.getElementById("publicationname").style.borderColor = "";
            var publicationname = document.getElementById("publicationname").value;
        }





        if(document.getElementById("authorname").value.length == 0) {
            document.getElementById("emptyauthorname").innerHTML = "*";
            document.getElementById("authorname").style.borderColor = "red";
        }else{
            document.getElementById("emptyauthorname").innerHTML = "";
            document.getElementById("authorname").style.borderColor = "";
            var authorname = document.getElementById("authorname").value;
        }



        if(document.getElementById("BookPrice").value.length == 0) {
            document.getElementById("emptybookPrice").innerHTML = "*";
            document.getElementById("BookPrice").style.borderColor = "red";
        }else{
            document.getElementById("emptybookPrice").innerHTML = "";
            document.getElementById("BookPrice").style.borderColor = "";
            var bookprice = document.getElementById("BookPrice").value;
        }





        if(document.getElementById("Purdate").value.length == 0) {
            document.getElementById("emptybookdata").innerHTML = "*";
            document.getElementById("Purdate").style.borderColor = "red";
        }else{

            if(!document.getElementById("Purdate").value.match(dateReg)){
                document.getElementById("emptybookdata").innerHTML = "*";
                document.getElementById("Purdate").style.borderColor = "red";
            }else{
                document.getElementById("emptybookdata").innerHTML = "";
                document.getElementById("Purdate").style.borderColor = "";
                var bookdate = document.getElementById("Purdate").value;
            }

        }




        if(document.getElementById("bookquantity").value.length == 0) {
            document.getElementById("emptybookquantity").innerHTML = "*";
            document.getElementById("bookquantity").style.borderColor = "red";
        }else{
            if (isNumeric(document.getElementById("bookquantity").value)){
                document.getElementById("emptybookquantity").innerHTML = "";
                document.getElementById("bookquantity").style.borderColor = "";
                var bookquantity = document.getElementById("bookquantity").value;
            }else{
                document.getElementById("emptybookquantity").innerHTML = "*";
                alert("BookQuanitity Must be Number type");
            }

        }


        if(document.getElementById("avaiablequantity").value.length == 0) {
            document.getElementById("emptyavaiblequantity").innerHTML = "*";
            document.getElementById("avaiablequantity").style.borderColor = "red";
        }else{
            if (isNumeric(document.getElementById("avaiablequantity").value)){
                document.getElementById("emptyavaiblequantity").innerHTML = "";
                document.getElementById("avaiablequantity").style.borderColor = ""
                var avaiblequantity = document.getElementById("avaiablequantity").value;
            }else{
                document.getElementById("emptyavaiblequantity").innerHTML = "*";
                alert("AvaiableQuanitity Must be Number type");
            }

        }

        if (!isEmpty(bookname) && !isEmpty(publicationname) && !isEmpty(authorname) && !isEmpty(bookprice) && !isEmpty(bookdate) && !isEmpty(bookquantity) && !isEmpty(avaiblequantity)  )
        {
            $.ajax({
                url:'updatebackround.php',
                type:'post',
                data:{
                    id:id,
                    bookname : bookname,
                    bookpublication : publicationname,
                    bookauthorname : authorname,
                    bookprice : bookprice,
                    bookdate : bookdate,
                    bookquantity : bookquantity,
                    avaiblequitity : avaiblequantity

                },
                success:function (res) {
                    console.log(res);
                    if (res == 1){



                        $(document).ready(function () {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Book Information Update Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            setTimeout(function () {
                                window.open("booklist.php","_self");
                            },1700);
                        })

                    }else{

                        $(document).ready(function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Book Information Update Faild !!! ',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        })

                    }

                }

            });
        }




    };









    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("bookimage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function isNumeric(value) {
        return /^-{0,1}\d+$/.test(value);
    }
    function isEmpty(property) {
        return (property === null || property === "" || typeof property === "undefined");
    }




</script>
