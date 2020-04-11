<?php

require_once('include/header.php') ?>
<div class="row">
	<!-----------------------------------------WIDGETBOX Main Box--------------------->
	<div class="col-sm-12">
		<h4 class="section-subtitle"><b>Return Books :</b></h4>
		<div class="panel">
			<div class="panel-content">
				<div class="table-responsive">
					<table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Roll No</th>
								<th>Reg No</th>
								<th>Student Name :</th>
								<th>Book Name : </th>
								<th>Book Image</th>
								<th>Issue Date</th>
								<th>Pices</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody
						<?php
						$query = "SELECT students.*, books.*, issuebook.issue_date,issuebook.Pices, issuebook.id as issueid FROM issuebook JOIN students ON issuebook.student_id = students.id JOIN books ON issuebook.book_id = books.id WHERE issuebook.return_date is NULL ORDER BY issuebook.id DESC";

						$results = mysqli_query($con,$query);
						while ($row = mysqli_fetch_assoc($results)){ ?>
							<tr>
                                <td><?= $row['roll']?></td>
                                <td><?= $row['reg no']?></td>
                                <td><?= ucwords($row['fname']." ".$row['lname'])  ?></td>
                                <td><?= $row['book_name'] ?></td>
                                <td><img src="../serverimages/<?= $row['book_image']?>" alt="images" style="width: 60px; height: 60px;"></td>
                                <td><?= date("d-M-Y",strtotime($row['issue_date']))?></td>
                                <td><?= $row['Pices']?></td>
                                <td><a href="returnclose.php?issueid=<?= base64_encode($row['issueid'])?>" class="btn btn-primary border">return book</a></td>
                            </tr>

						<?php    }
						
						?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>






<!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>
