<?php
//collect the POST data from the radio buttons
$service = $_POST['service'];

//Combine the numeric input into single string
$digit1 = $_POST['digit1'];
$digit2 = $_POST['digit2'];
$digit3 = $_POST['digit3'];
$digit4 = $_POST['digit4'];
$digit5 = $_POST['digit5'];
$digit6 = $_POST['digit6'];

//In case decimal points are left blank, but should equal 0
if ($digit5 == NULL) {
    $digit5 = 0;
}

if ($digit6 == NULL) {
    $digit6 = 0;
}

$totalCost = "$digit1" . "$digit2" . "$digit3" . "$digit4" . "." . "$digit5" . "$digit6";

$tipTotal = NULL;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PHP Basics Project 2</title>
</head>
<body>
    <div class="intro_image"></div>
    
    <header>
        <h1>PHP Basics Project 2</h1>
        <h2>Tip Calculator</h2>
    </header>
    <main>
        <?php
        if (empty($service)) {
        ?>
        <form method="POST" action="#">
			<div class="enter_total">
				<p>How much was the bill?</p>
				<div class="dollar_amount">
					<div class="dollar_sign">$</div>
					<div>
						<input type="text" name="digit1" maxlength="1"> <span>,</span>
					</div>
					<div>
						<input type="text" name="digit2" maxlength="1"> 
					</div>
					<div>
						<input type="text" name="digit3" maxlength="1"> 
					</div>
					<div>
						<input type="text" name="digit4" maxlength="1"> <span>.</span>
					</div>
					<div>
						<input type="text" name="digit5" maxlength="1"> 
					</div>
					<div>
						<input type="text" name="digit6" maxlength="1"> 
					</div>
				</div>
				<p>
					How was the service?<br/>
					<input type="radio" id="excellent" name="service" value="excellent" checked>
					<label for="excellent">Excellent</label><br/>
					<input type="radio" id="average" name="service" value="average">
					<label for="average">Average</label><br/>
					<input type="radio" id="poor" name="service" value="poor">
					<label for="poor">Poor</label>
				</p>
			</div>
			<input type="submit" id="submit" value="Calculate my tip!">
        </form>
        <?php
        } else {
        ?>
    <div class="tip_amount">
        <?php
            switch($service) {
                case "excellent":
                    $tipTotal = round(($totalCost * .20), 2);
                    echo "Tip amount: $<span>" . $tipTotal . "</span>";
                    echo "<br>";
                    echo "You should tip 20% for excellent service.";
                    break;
                case "average":
                    $tipTotal = round(($totalCost * .15), 2);
                    echo "Tip amount: $<span>" . $tipTotal . "</span>";
                    echo "<br>";
                    echo "Average service doesn't require more than 15%. But think long and hard about what average service means. Like, don't be a jerk.";
                    break;
                case "poor":
                    $tipTotal = round(($totalCost * .10), 2);
                    echo "Tip amount: $<span>" . $tipTotal . "</span>";
                    echo "<br>";
                    echo "Even if the service was really bad, it won't kill you to give a 10% tip. <br>Hey, a server has gotta live, even the bad ones.";
                    break;
                }
            ?>
        </div>
        <a href="index.php" class="go_back">Go back to caluculator</a>
                <?php
                
        }
        ?>
        <div class="highlights">
            <p>Topics include:</p>
            <ul>
                <li>Switch Statement</li>
                <li>Concatenation</li>
                <li>Using HTML and PHP</li>
                <li>Using round()</li>
            </ul>
        </div>
    </main>
    
    <footer>
        <p>&copy; Olivia Orr 2017</p>
        <div class="social">
            <a href="https://github.com/oorr90" target="_blank"><img src="img/github_circle_logo_white.png" alt="Github icon"></a>
            <a href="https://www.linkedin.com/in/olivia-orr-a51bbb50/" target="_blank"><img src="img/linkedin_circle_logo_white.png" alt="LinkedIn icon"></a>
        </div>
    </footer>
    
</body>
</html>