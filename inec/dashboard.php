<?php
    include('../core/init.php');

    $getAdmin = $stu->getStudentData($_SESSION['inec']);
    $getSession = $stu->getStudentData($_SESSION['inec']);
    
    if(isset($_SESSION['inec'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: '.BASE_URL.'login');
        }else{

            $conn = mysqli_connect('localhost','root','(Afolabi8120)', 'dpt_db');

            $sql = "SELECT c.picture, v.candidate_id, c.fullname, COUNT(v.candidate_id) AS vote_count FROM tblvote AS v INNER JOIN tblcandidate AS c ON c.id = v.candidate_id WHERE c.post = 'President' GROUP BY c.id ";
            $query = mysqli_query($conn, $sql);
            $query_result = mysqli_num_rows($query);
            if($query_result > 0){
                while($row = mysqli_fetch_array($query)){
                    $president_name[] = $row['fullname'];
                    $president_vote_count[] = $row['vote_count'];
                }
            }

            $sql = "SELECT c.picture, v.candidate_id, c.fullname, COUNT(v.candidate_id) AS vote_count FROM tblvote AS v INNER JOIN tblcandidate AS c ON c.id = v.candidate_id WHERE c.post = 'Vice President' GROUP BY c.id ";
            $query = mysqli_query($conn, $sql);
            $query_result = mysqli_num_rows($query);
            if($query_result > 0){
                while($row = mysqli_fetch_array($query)){
                    $president_name2[] = $row['fullname'];
                    $president_vote_count2[] = $row['vote_count'];
                }
            }

            $sql = "SELECT c.picture, v.candidate_id, c.fullname, COUNT(v.candidate_id) AS vote_count FROM tblvote AS v INNER JOIN tblcandidate AS c ON c.id = v.candidate_id WHERE c.post = 'General Secretary' GROUP BY c.id ";
            $query = mysqli_query($conn, $sql);
            $query_result = mysqli_num_rows($query);
            if($query_result > 0){
                while($row = mysqli_fetch_array($query)){
                    $president_name3[] = $row['fullname'];
                    $president_vote_count3[] = $row['vote_count'];
                }
            }

            $sql = "SELECT c.picture, v.candidate_id, c.fullname, COUNT(v.candidate_id) AS vote_count FROM tblvote AS v INNER JOIN tblcandidate AS c ON c.id = v.candidate_id WHERE c.post = 'Financial Secretary' GROUP BY c.id ";
            $query = mysqli_query($conn, $sql);
            $query_result = mysqli_num_rows($query);
            if($query_result > 0){
                while($row = mysqli_fetch_array($query)){
                    $president_name4[] = $row['fullname'];
                    $president_vote_count4[] = $row['vote_count'];
                }
            }

        }

    }else{
        header('location: '.BASE_URL.'login');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $getAdmin->fullname; ?>'s Dashboard </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="./css/css/fonts.min.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css/atlantis.css">
</head>
<body>
    <div class="wrapper">
        <?php require_once('./includes/header.php') ?>

        <?php require_once('./includes/sidebar.php') ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="dashboard.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <h4><?php echo $getdate . ", ". $getAdmin->fullname; ?></h4>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                    
                        <div class="row">
                            <div class="col-sm-12 col-md-12" id="candidate-container">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">President</div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="row">
                                            <div class="chart-container col-md-4">
                                                <canvas id="barChart" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12" id="candidate-container">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Vice President</div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="row">
                                            <div class="chart-container col-md-4">
                                                <canvas id="barChart2" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="pieChart2" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="doughnutChart2" style="width: 50%; height: 50%"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12" id="candidate-container">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">General Secretary</div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="row">
                                            <div class="chart-container col-md-4">
                                                <canvas id="barChart3" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="pieChart3" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="doughnutChart3" style="width: 50%; height: 50%"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12" id="candidate-container">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Financial Secretary</div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="row">
                                            <div class="chart-container col-md-4">
                                                <canvas id="barChart4" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="pieChart4" style="width: 50%; height: 50%"></canvas>
                                            </div>

                                            <div class="chart-container col-md-4">
                                                <canvas id="doughnutChart4" style="width: 50%; height: 50%"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    </div>
                </div>
            </div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>
            <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

            <script>

                barChart = document.getElementById('barChart').getContext('2d');
                pieChart = document.getElementById('pieChart').getContext('2d');
                doughnutChart = document.getElementById('doughnutChart').getContext('2d');

                var myBarChart = new Chart(barChart, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($president_name); ?>,
                        datasets : [{
                            label: "President",
                            backgroundColor: 'rgb(23, 125, 255)',
                            borderColor: 'rgb(23, 125, 255)',
                            data: <?php echo json_encode($president_vote_count); ?>,
                        }],
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'botton',
                            labels: {
                                fontColor: '#28B62C',
                                fontFamily: 'Helvetica',
                                fontSize: 14,
                            }
                        }
                    }
                });

                var myPieChart = new Chart(pieChart, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count); ?>,
                            backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
                            borderWidth: 0
                        }],
                        labels: <?php echo json_encode($president_name); ?> 
                    },
                    options : {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend: {
                            position : 'bottom',
                            labels : {
                                fontColor: 'rgb(154, 154, 154)',
                                fontSize: 11,
                                usePointStyle : true,
                                padding: 20
                            }
                        },
                        pieceLabel: {
                            render: 'percentage',
                            fontColor: 'white',
                            fontSize: 14,
                        },
                        tooltips: false,
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                var myDoughnutChart = new Chart(doughnutChart, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: <?php echo json_encode($president_vote_count); ?>,
                        backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
                    }],

                    labels: <?php echo json_encode($president_name); ?>
                },
                options: {
                    responsive: true, 
                    maintainAspectRatio: false,
                    legend : {
                        position: 'bottom'
                    },
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 20,
                            bottom: 20
                        }
                    }
                }
            });


                barChart2 = document.getElementById('barChart2').getContext('2d');
                pieChart2 = document.getElementById('pieChart2').getContext('2d');
                doughnutChart2 = document.getElementById('doughnutChart2').getContext('2d');

                var myBarChart2 = new Chart(barChart2, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($president_name2); ?>,
                        datasets : [{
                            label: "Vice President",
                            backgroundColor: 'rgb(23, 125, 255)',
                            borderColor: 'rgb(23, 125, 255)',
                            data: <?php echo json_encode($president_vote_count2); ?>,
                        }],
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'botton',
                            labels: {
                                fontColor: '#28B62C',
                                fontFamily: 'Helvetica',
                                fontSize: 14,
                            }
                        }
                    }
                });

                var myPieChart2 = new Chart(pieChart2, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count2); ?>,
                            backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
                            borderWidth: 0
                        }],
                        labels: <?php echo json_encode($president_name2); ?> 
                    },
                    options : {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend: {
                            position : 'bottom',
                            labels : {
                                fontColor: 'rgb(154, 154, 154)',
                                fontSize: 11,
                                usePointStyle : true,
                                padding: 20
                            }
                        },
                        pieceLabel: {
                            render: 'percentage',
                            fontColor: 'white',
                            fontSize: 14,
                        },
                        tooltips: false,
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                var myDoughnutChart2 = new Chart(doughnutChart2, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count2); ?>,
                            backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
                        }],

                        labels: <?php echo json_encode($president_name2); ?>
                    },
                    options: {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend : {
                            position: 'bottom'
                        },
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                barChart3 = document.getElementById('barChart3').getContext('2d');
                pieChart3 = document.getElementById('pieChart3').getContext('2d');
                doughnutChart3 = document.getElementById('doughnutChart3').getContext('2d');

                var myBarChart3 = new Chart(barChart3, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($president_name3); ?>,
                        datasets : [{
                            label: "General Secretary",
                            backgroundColor: 'rgb(23, 125, 255)',
                            borderColor: 'rgb(23, 125, 255)',
                            data: <?php echo json_encode($president_vote_count3); ?>,
                        }],
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'botton',
                            labels: {
                                fontColor: '#28B62C',
                                fontFamily: 'Helvetica',
                                fontSize: 14,
                            }
                        }
                    }
                });

                var myPieChart3 = new Chart(pieChart3, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count3); ?>,
                            backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
                            borderWidth: 0
                        }],
                        labels: <?php echo json_encode($president_name3); ?> 
                    },
                    options : {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend: {
                            position : 'bottom',
                            labels : {
                                fontColor: 'rgb(154, 154, 154)',
                                fontSize: 11,
                                usePointStyle : true,
                                padding: 20
                            }
                        },
                        pieceLabel: {
                            render: 'percentage',
                            fontColor: 'white',
                            fontSize: 14,
                        },
                        tooltips: false,
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                var myDoughnutChart3 = new Chart(doughnutChart3, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count3); ?>,
                            backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
                        }],

                        labels: <?php echo json_encode($president_name3); ?>
                    },
                    options: {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend : {
                            position: 'bottom'
                        },
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                barChart4 = document.getElementById('barChart4').getContext('2d');
                pieChart4 = document.getElementById('pieChart4').getContext('2d');
                doughnutChart4 = document.getElementById('doughnutChart4').getContext('2d');

                var myBarChart4 = new Chart(barChart4, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($president_name4); ?>,
                        datasets : [{
                            label: "General Secretary",
                            backgroundColor: 'rgb(23, 125, 255)',
                            borderColor: 'rgb(23, 125, 255)',
                            data: <?php echo json_encode($president_vote_count4); ?>,
                        }],
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'botton',
                            labels: {
                                fontColor: '#28B62C',
                                fontFamily: 'Helvetica',
                                fontSize: 14,
                            }
                        }
                    }
                });

                var myPieChart4 = new Chart(pieChart4, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count4); ?>,
                            backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
                            borderWidth: 0
                        }],
                        labels: <?php echo json_encode($president_name4); ?> 
                    },
                    options : {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend: {
                            position : 'bottom',
                            labels : {
                                fontColor: 'rgb(154, 154, 154)',
                                fontSize: 11,
                                usePointStyle : true,
                                padding: 20
                            }
                        },
                        pieceLabel: {
                            render: 'percentage',
                            fontColor: 'white',
                            fontSize: 14,
                        },
                        tooltips: false,
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

                var myDoughnutChart4 = new Chart(doughnutChart4, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: <?php echo json_encode($president_vote_count4); ?>,
                            backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
                        }],

                        labels: <?php echo json_encode($president_name4); ?>
                    },
                    options: {
                        responsive: true, 
                        maintainAspectRatio: false,
                        legend : {
                            position: 'bottom'
                        },
                        layout: {
                            padding: {
                                left: 20,
                                right: 20,
                                top: 20,
                                bottom: 20
                            }
                        }
                    }
                });

            </script>



        </div>
        
    </div>

</body>
</html>