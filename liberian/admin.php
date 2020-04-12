<?php

require_once('include/header.php') ?>
<div class="row">
	<!-----------------------------------------WIDGETBOX Main Box--------------------->
	<div class="col-sm-12">
		<h4 class="section-subtitle"><b>Book List :</b></h4>
		<div class="row text-right" style="margin-right: 6px">
			<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus" style="margin-right: 5px" ></i>Add Admin</button>
		</div>
		<div class="panel">
			<div class="panel-content">
				<div class="table-responsive">
					<table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>SL No :</th>
								<th>Image</th>
								<th>Name : </th>
								<th>Email :</th>
								<th>Username</th>
								<th>Password</th>
								<th>Number</th>
								<th>Address</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody
						<?php
						$sl = 1;
						$resutls = mysqli_query($con, "SELECT * FROM liberian" );


						while ($row = mysqli_fetch_array($resutls)){ ?>
							<tr>
								<td><?= $sl++; ?></td>
								<td><img src="../serverimages/<?= $row['images'] ?>" alt="" width="50" height="50"></td>
								<td><?= $row['Name'] ?></td>
								<td><?= $row['Email'] ?></td>
								<td><?= $row['Username'] ?></td>
								<td><?= $row['Password'] ?></td>
								<td><?= $row['Number'] ?></td>
								<td><?= $row['Address'] ?></td>
								<td>
									<a href="editprofile.php" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
									<button class="btn btn-danger" style="margin-top: -10px;"><i class="fa fa-trash-o"></i></button>

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

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header " style="background-color: #b3b2b2">
                <h3 class="modal-title" id="exampleModalLabel" style="float: left">Add User</h3>
                <button type="button" class="close" id="times" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" method="" id="form" >
					<div class="form-group ">
						<label for="name">Name :</label>
						<input type="text" class="form-control" id="name" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<span id="emailresults" style="color: red"></span>
						<span id="duplicationemail" style="color: red"></span>

						<input type="text" class="form-control"  id="email" placeholder="Email :">
					</div>
					<div class="form-group">
						<label for="username">User Name :</label>
						<input type="text" class="form-control" id="username" placeholder="Username :">
					</div>
					<div class="form-group">
						<label for="password">Password :</label>
						<span id="passwordresults" style="color: red"></span>
						<input type="password" class="form-control" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="cpassword">Confrim Password :</label>
						<span id="cpasswordresults" style="color: red"></span>
						<input type="password" class="form-control" id="cpassword" placeholder="Password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Save</button>
					</div>
				</form>
			</div>
			<div class="modal-footer" style="background-color: #b3b2b2">
				<button type="button" class="btn btn-secondary" id="closeid" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>

<script>
	$(document).ready(function () {



		var inputerros =  new Array();
		var emailduplication = 0;


        $("#email").change(function(){

            var id = $("#email").val();


            $.ajax({
                url:'addadminbackground.php',
                type:'post',
                data:{
                    eid: id
                },
                success:function(res){
                    if(res == 1){
                        $("#duplicationemail").text("Email already registred");
                        emailduplication = 1;


                    }else{
                        emailduplication = 0;
                        $("#duplicationemail").text("");

                    }

                }

            });

        })
		
		$("#form").on("submit", function (event) {
			event.preventDefault();

			var inputerros =  new Array();







			if ($("#name").val() != ""){
				var name = $("#name").val();
				$("#name").closest(".form-group").removeClass("has-error");
			}else{
				inputerros[0] = "empty";
				$("#name").closest(".form-group").addClass("has-error");
			}

			if ($("#email").val() != ""){

				email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

				if(email_regex.test($("#email").val())){



					var email = $("#email").val();
					$("#email").closest(".form-group").removeClass("has-error");
					$("#emailresults").text("");

				}else{
					$("#emailresults").text("Invalid email");
					inputerros[2] = "emailempty";
				}


			}else{
				inputerros[1] = "emailempty";
				$("#email").closest(".form-group").addClass("has-error");
			}

			if ($("#username").val() != ""){
				var username = $("#username").val();
				$("#username").closest(".form-group").removeClass("has-error");
			}else{
				inputerros[3] = "usernameempty";
				$("#username").closest(".form-group").addClass("has-error");
			}

			if ($("#password").val() != ""){


				if($("#password").val().length >= 6){
					var password = $("#password").val();
					$("#passwordresults").text("");
					$("#password").closest(".form-group").removeClass("has-error");
				}else{
					inputerros[4] = "passwordinvalid";
					$("#passwordresults").text("Password must be grather than 6");
				}



			}else{
				inputerros[5] = "emptypassowrd";
				$("#password").closest(".form-group").addClass("has-error");
			}

			if ($("#cpassword").val() != ""){


				if($("#password").val() == $("#cpassword").val()  ){

					var cpassword = $("#cpassword").val();
					$("#cpasswordresults").text("");
					$("#cpassword").closest(".form-group").removeClass("has-error");

				}else{
					inputerros[6] = "passwordinvalid";
					$("#cpasswordresults").text("Password don't match");
				}



			}else{
				inputerros[7] = "emptypassowrd";
				$("#cpassword").closest(".form-group").addClass("has-error");
			}



			if(inputerros.length == 0 && emailduplication == 0 ){


				$.ajax({

					url:'addadminbackground.php',
					type:'post',
					data: {
						nam:name,
						uemail:email,
						username: username,
						pass: password,
						cpass : cpassword
					},
					success:function (res) {
						console.log(res);

					}
				});
			}










		})

        $("#closeid").click(function () {
            $("#form").trigger('reset');
        })


        $("#times").click(function () {
            $("#form").trigger('reset');
        })



	})
</script>
