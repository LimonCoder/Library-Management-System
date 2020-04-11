<?php require_once('include/header.php') ?>

<div class="row">
    <!--WIDGETBOX Main Box-->
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Book List :</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>BookName</th>
                            <th>Book Image</th>
                            <th>Publication Name</th>
                            <th>Author Name</th>
                            <th>Purchase Date</th>
                            <th>Book Quantity :</th>
                            <th>Avaiabile Quantity :</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody
                            <?php
                                $results = mysqli_query($con,"SELECT * FROM books");
                                while ($row = mysqli_fetch_assoc($results)){ ?>
                                    <tr id="book<?= $row['id']?>">
                                        <td><?= $row['book_name']?></td>
                                        <td><img src="../serverimages/<?= $row['book_image']?>" alt="<?= $row['book_image']?>" width="80" height="80"></td>
                                        <td><?= $row['book_publicationname']?></td>
                                        <td><?= $row['book_authorname']?></td>
                                        <td><?= date("d-M-Y", strtotime($row['book_purchase_date'])) ?></td>
                                        <td><?= $row['book_qty']?></td>
                                        <td><?= $row['avaible_qty']?></td>
                                        <td>
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#list-<?= $row['id'] ?>">
                                            <i class="fa fa-eye"></i>
                                            </a>
                                           <a href="updatebook.php?updateid=<?= base64_encode($row['id']) ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                                    <button  class="delid btn btn-danger" style="margin-top: -10px;" id="<?= $row['id']?>" <?=($row['book_qty'] != $row['avaible_qty'])? 'disabled':'' ?> ><i class="fa fa-trash-o"></i></button>






                                        </td>
                                    </tr>

                            <?php     }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <!--WIDGETBOX Main Box-->





</div>

<!------------------------------ Modal ------------------------------------------------------------------------------------>
<!-- The Modal -->
<?php
$resutls = mysqli_query($con,"SELECT * FROM books");
while ($row = mysqli_fetch_assoc($resutls)){ ?>
    <div class="modal " id="list-<?= $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive table-bordered table-hover">
                        <tr>
                            <th>Book Name :</th>
                            <td><?= $row['book_name']?></td>
                        </tr>
                        <tr>
                            <th>Book Image :</th>
                            <td><img src="../serverimages/<?= $row['book_image']?>" alt="<?= $row['book_image']?>" width="80" height="80"></td>
                        </tr>
                        <tr>
                            <th>Publication Name :</th>
                            <td><?= $row['book_publicationname']?></td>
                        </tr>
                        <tr>
                            <th>Author Name :</th>
                            <td><?= $row['book_authorname']?></td>
                        </tr>
                        <tr>
                            <th>Purchase Date :</th>
                            <td><?= date("d-M-Y", strtotime($row['book_purchase_date'])) ?></td>
                        </tr>
                        <tr>
                            <th>Book Price :</th>
                            <td><?= $row['book_price']?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity :</th>
                            <td><?= $row['book_qty']?></td>
                        </tr>
                        <tr>
                            <th>Avaiabile Quantity :</th>
                            <td><?= $row['avaible_qty']?></td>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php        }
?>

<?php require_once('include/footer.php') ?>

<script>


        $(document).ready(function () {
            $(".delid").click(function () {
                var del = $(this).attr('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this book ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        $.ajax({
                            url:'deletebackground.php',
                            type:'post',
                            data:{
                                deleteid :del
                            },
                            success:function (res) {

                                if (res == 1){
                                    Swal.fire(
                                        'Deleted!',
                                        'Book has been deleted !! .',
                                        'success'
                                    )
                                    $("#book"+del).hide("fade");

                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Book delete Faild',
                                        footer: '<a href>Why do I have this issue?</a>'
                                    })
                                }


                            }
                        });


                    }else {

                    }
                })

            })
        })






</script>
