<?php
  session_start();
  $db=mysqli_connect('localhost','root','','att') or die("Connection failed");
  if ($_SESSION["logged"]!=1)
    header("location: stulogoin.php?err=1");
	$reg=$_SESSION['REG'];
	echo "<title> Welcome $reg </title>";
	
?>
<html>
<head>
<link rel=stylesheet type="text/css" href="as.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<script language="Javascript">

function deleteask(){
  if (confirm('Are you sure you want to logout?')){
    return true;
  }else{
    return false;
  }
}
</script>
<style type="text/css">


#chart-container {
    width: 50%;
    height: auto;
	background-color:white;
	margin-top:20px;
}
</style>
</head>

  <body background="background.jpg">
        <header>
           <img src="logo.png">
		    <font face="Georgia" color="blue" size="5"><b>Attelp</b></font>
            <nav>
                <ul>
                    <li><a href="stud1.php">Home</a></li>
                    <li><a href="#">Classes</a></li>
                    <li><a href="about.html">About</a></li>
					<li><a href="logout.php">Logout</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
        </header>
<?php
 $query="SELECT * FROM login where regno='$reg';";
        mysqli_query($db,$query) or die("Query Failed");
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_array($result)){
 $name=$row['name'];
		}
?>		

		    
<?php
echo "<marquee bgcolor='black'><h3 style= color:#FFFFFF;'> Welcome $name $reg</h3></marquee> " ;
?>
<div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("pra.php",
                function (data)
                {
                    console.log(data);
                     var subject = [];
                    var attendance= [];

                    for (var i in data) {
                        subject.push(data[i].subid);
                        attendance.push(data[i].at);
                    }

                    var chartdata = {
                        labels: subject,
                        datasets: [
                            {
                                label: 'Student Attendance',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: attendance
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
						options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fixedStepSize: 5,
                        max: 100,
                        min: 0
                    },
                    gridLines: {
                        color: 'black',
                        zeroLineColor: 'black',
                        zeroLineWidth: 4
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display:false,
                        zeroLineWidth: 4,
                    },
                  barPercentage: 1.0,
                        categoryPercentage: 0.1
                }]
            }
        }
                    });
                });
            }
        }
        </script>


</body>
</html>