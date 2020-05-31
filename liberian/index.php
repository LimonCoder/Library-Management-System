<?php require_once('include/header.php') ?>
<?php
    $results = mysqli_query($con,"SELECT COUNT(*) as count FROM students");
    $row = mysqli_fetch_assoc( $results);
?>
                    <div class="row">
                        <!--WIDGETBOX Main Box-->
                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-users "></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <h4 class="subtitle ">Total Student</h4>
                                               <h1 class="counter title" style="display: inline-block; width: 32%"><?=$row['count']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-user-plus "></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <?php
                                                $adminresults = mysqli_query($con,"SELECT COUNT(*) as admin FROM liberian");
                                                $admin = mysqli_fetch_assoc($adminresults);
                                                ?>
                                                <h4 class="subtitle ">Admin </h4>
                                                <h1 class="counter title" style="display: inline-block; width: 32%"><?=$admin['admin']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-user"></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <?php
                                                    $results = mysqli_query($con,"SELECT COUNT(*) as active FROM students WHERE status = 1");
                                                    $activeusers = mysqli_fetch_assoc($results);
                                                ?>
                                                <h4 class="subtitle ">Active Student</h4>
                                                <h1 class="counter title" style="display: inline-block; width: 32%"><?=$activeusers['active']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-user "></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <?php
                                                $inresults = mysqli_query($con,"SELECT COUNT(*) as ainctive FROM students WHERE status = 0");
                                                $inactiveusers = mysqli_fetch_assoc($inresults);
                                                ?>
                                                <h4 class="subtitle">Inactive Student</h4>
                                                 <h1 class="counter title" style="display: inline-block; width: 32%"><?=$inactiveusers['ainctive']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <!--WIDGETBOX Main Box-->





                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-book "></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <?php
                                                $inresults = mysqli_query($con,"SELECT COUNT(id) AS totalbooks FROM books");
                                                $totalbook = mysqli_fetch_assoc($inresults);
                                                ?>
                                                <h4 class="subtitle">Total Books</h4>
                                                <h1 class="counter title" style="display: inline-block; width: 32%"><?=$totalbook['totalbooks']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-3 col-md-3 ">

                            <div class="panel widgetbox wbox-2 bg-darker-1 color-light">
                                <a href="#">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="icon fa fa-cloud "></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <?php
                                                $inresults = mysqli_query($con,"SELECT SUM(avaible_qty) as totalavaiblebook FROM books");
                                                $avaiblebookstore = mysqli_fetch_assoc($inresults);
                                                ?>
                                                <h4 class="subtitle">Books Avaible</h4>
                                                <h1 class="counter title" style="display: inline-block; width: 32%"><?=$avaiblebookstore['totalavaiblebook']?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">Students Summery
                            </div>
                            <div class="panel-body">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    

                </div>

<?php require_once('include/footer.php') ?>

<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $activeusers['active']; ?>, <?php echo $inactiveusers['ainctive']; ?>],
                backgroundColor: [
                    'rgb(136, 240, 119)',
                    'rgb(206, 24, 28)'


                ],
                borderColor: [
                    'rgb(76, 243, 212)',
                    'rgba(54, 162, 235, 1)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
