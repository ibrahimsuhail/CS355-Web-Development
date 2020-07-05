<?php
#       does not save account type on logout and register
#       if problem persists add a delete me button
#       dont close connesction ever
#       add more q's
#       teacher should be able to delete questions, and check if the requested question to be deleted exists
#       cannot delete qsets!!!!!
#       fix score bs

use function PHPSTORM_META\type;

session_start();
if (!isset($_SESSION['success'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    // session_destroy();
    $account_type =  $_SESSION['account_type'];
    //session_write_close();
    unset($_SESSION['success']);
    unset($account_type);
    header("location: login.php");
}

$account_type =  $_SESSION['account_type'];
$u_type = '';
$first_name =  $_SESSION['first_name'];
$email =  $_SESSION['email'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$last_name = $_SESSION['last_name'];
$full_name = $first_name . " " . $last_name;
$timestamp = date("Y-m-d H:i:s");


?>
<?php

$servername = "mars.cs.qc.cuny.edu";
$mysqluser = "suib1362";
$passw = "23641362";
$dbname = "suib1362";
$conn = new mysqli($servername, $mysqluser, $passw, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>brainblast.com</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--
  <link rel="stylesheet" type="text/css" href="style.css">
-->

</script>
<style>
    b {
        color: darkslategray;
    }

    .navbar-font {
        color: gainsboro;
    }

    .lcol {
        border-style: solid;
        border-top: 0px;
        border-bottom: 0px;
        border-left: 0px;
        height: 100vh;
    }

    .rcol {
        border-style: solid;
        border-top: 0px;
        border-bottom: 0px;
        border-right: 0px;
        height: 100vh;
    }


    .dropdown-menu {
        background-color: cadetblue;
    }

    p,
    div {
        color: gainsboro;
        border-color: rgba(105, 105, 105, 0.26);
    }

    h4 {
        color: black;
    }

    html,
    body {
        background-color: cadetblue;
    }

    .btn-space {
        margin-right: 5px;
    }
</style>
</head>

<body>
    <?php if (isset($_SESSION['success'])) : ?>
        <!-- NAVBAR BEGINS HERE-->
        <nav class="navbar navbar-expand-sm bg-dark">
            <a class="navbar-brand" href="index.html">brainblast</a>
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                        Course
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://www.zybooks.com/" target="_blank">Zybooks</a>
                        <a class="dropdown-item" href="https://tophat.com/" target="_blank">TopHat</a>
                        <a class="dropdown-item" href="https://drive.google.com/open?id=1co7vzY9_75cCiuNTHXCGf3pKbpf_TTwC" target="_blank">Course Google Drive</a>
                        <a class="dropdown-item" href="https://www.w3schools.com/" target="_blank">W3Schools</a>
                        <a class="dropdown-item" href="https://bbhosted.cuny.edu/" target="_blank">Blackboard</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                    About
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">About The Developers</a>
                </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                Contact
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="mailto:adil.khan42@qmail.cuny.edu">Adil Khan</a>
                <a class="dropdown-item" href="mailto:ibrahimsuhail23@gmail.com">Ibrahim Suhail</a>
                <a class="dropdown-item" href="mailto:sumeet.parmar30@qmail.cuny.edu">Sumeet Parmar</a>
                <a class="dropdown-item" href="mailto:Mohamed.Sultan05@qmail.cuny.edu">Mohamed Sultan</a>
            </div>
            </li>
        </nav>
        <!--NAVBAR ENDS HERE-->
    <?php endif ?>
    <!-- Student mode -->
    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) :
        $sql = "SELECT * from appuser where email = '$email' LIMIT 1";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $u_type = $row['user_type'];
        }
    ?>

        <?php if ($u_type == "S") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 lcol">
                        <h4 class="text-left">Question Sets</h4>

                        <script>
                            $(function() {
                                $("#cntext").hide();
                            });
                            $("#cn").click(function() {
                                $("#cntext").show();
                            });
                        </script>
                        <?php
                        $sql = "SELECT title FROM questionset";
                        $result = $conn->query($sql);
                        $title = "";
                        if ($result->num_rows > 0) {
                        } else {
                            echo "0 results";
                        }

                        $rowss = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rowss[] = $row['title'];
                        }
                        for ($i = 0; $i < count($rowss); $i++) {
                            echo "<a id = 'qs" . $i . "'class = 'text-body' name = 'qs" . $i . ".'href = 'home.php?qs" . $i . "'> <u>" . $rowss[$i] . "<br> </u> </a>";
                            if (isset($_GET['qs' . $i])) {
                                $title = $rowss[$i];
                                $qsnum = $i++;
                            }
                        }

                        ?>
                    </div>
                    <div class="col-md-8 mcol">
                        <h4 class="text-center bg-primary">Welcome <?php echo $full_name; ?></h4><br>
                        <?php




                        $score = 0;
                        $total = 0;
                        // get answers for this set
                        $qs_num = $qsnum + 1;


                        $sql = "SELECT answer from question where question_set = '$qs_num'";
                        $results = $conn->query($sql);
                        if ($results->num_rows == 0) {
                            echo 'no records';
                        }
                        $answers = [];
                        while ($row = mysqli_fetch_assoc($results)) {
                            $answers[] = $row['answer'];
                        }
                        for ($i = 0; $i < count($answers); $i++) {
                            // echo $answers[$i];
                        }
                        // get points for this set
                        $sql = "SELECT points from question where question_set = '$qs_num'";
                        $results = $conn->query($sql);
                        if ($results->num_rows == 0) {
                            echo 'no records';
                        }
                        $points = [];
                        while ($row = mysqli_fetch_assoc($results)) {
                            $points[] = $row['points'];
                        }
                        for ($i = 0; $i < count($points); $i++) {
                            $total += $points[$i];
                        }
                        // echo $total;
                        $sql = "SELECT c.question_id, c.question_set, c.choice1, c.choice2, c.choice3, c.choice4, q.title, question_type, content, points
                        from choices c 
                        join question q
                        on q.question_id = c.question_id
                        and q.question_set = c.question_set
                        where c.question_set = '$qs_num'";
                        $results = $conn->query($sql);
                        if ($results->num_rows == 0) {
                            echo 'no records';
                        }

                        // $this_set = $qs_num - 1;
                        while ($row = mysqli_fetch_assoc($results)) {
                            $qset = $qs_num - 1;
                            echo "<h4>" .  $row["title"] . "</h4>";
                            echo "<h5 class = 'text-dark'><u>" . $row["content"] . "</u><h5>";
                            echo "<h6 class='text-right text-danger'>" . $row["points"] . " points </h6>";
                            $formmmm = "
                            <form class='form' id = 'submitTest' action = 'home.php?qs" . $qset . "' method='post'>";
                            echo $formmmm;
                            echo "
                            <div class='input-group'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text'> 
                                    <input type='radio' name='" . $row['question_id'] . "'value='" . $row['choice1'] . "'>
                                    </div>
                                </div>
                                    <label type='text' class='form-control'>" . $row['choice1'] . "</label>
                            </div>";

                            echo "
                            <div class='input-group'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text'> 
                                    <input type='radio' name='" . $row['question_id'] . "'value='" . $row['choice2'] . "'>
                                    </div>
                                </div>
                                    <label type='text' class='form-control'>" . $row['choice2'] . "</label>
                            </div>";

                            echo "
                            <div class='input-group'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text'> 
                                    <input type='radio' name='" . $row['question_id'] . "'value='" . $row['choice3'] . "'>
                                    </div>
                                </div>
                                    <label type='text' class='form-control'>" . $row['choice3'] . "</label>
                            </div>";

                            echo "
                            <div class='input-group'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text'> 
                                    <input type='radio' name='" . $row['question_id'] . "'value='" . $row['choice4'] . "'>
                                    </div>
                                </div>
                                    <label type='text' class='form-control'>" . $row['choice4'] . "</label>
                            </div>";
                        }
                        // make new sql statement to get WA info
                        $sql = "SELECT question_id, content, question_type, points, title from question where question_set = '$qs_num'";
                        $results = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            if ($row['question_type'] == "WA") {
                                echo "<h4>" .  $row["title"] . "</h4>";
                                echo "<h5 class = 'text-dark'><u>" . $row["content"] . "</u><h5>";
                                echo "<h6 class='text-right text-danger'>" . $row["points"] . " points </h6>";
                                // echo "<label for =" . $row['question_id'] . "  class = 'text-dark'><u>" . $row["content"] . "</u></label>";
                                echo "<input  type= 'text' name='" . $row['question_id'] . "' id='" . $row['question_id'] . "' class='form-control'>";
                            }
                            $this_q = $row['question_id'];
                            // echo $this_q;
                        }

                        // check question number: echo $this_q;
                        // echo $qs_num;








                        echo "<br> <input type = 'submit' value = 'Submit' id = 'submit_rq' name = 'submit_rq' class='btn-block btn btn-lg btn-primary'>";
                        echo "</form>";
                        // calculate the score
                        if (isset($_POST['submit_rq'])) {
                            $student_answers = array();
                            for ($i = 0; $i < count($answers); $i++) {
                                array_push($student_answers, $_POST[$i + 1]);
                            }

                            //echo $_POST['1'] . $_POST['2'];
                            // echo $total;
                            for ($i = 0; $i < count($points); $i++) {
                                // echo $_POST[$i+1],$answers[$i];

                                if (
                                    strtoupper($_POST[$i + 1]) == strtoupper($answers[$i])
                                    || $_POST[$i + 1] == $answers[$i]
                                ) {
                                    $score += $points[$i];
                                }
                            }
                            $score = round($score / $total * 100, 2);
                            $sql = "INSERT into student_scores(questionset, name, score)
                            VALUES('$qs_num', '$full_name', '$score')";
                            // echo $qs_num.$full_name.$score;
                            $result = $conn->query($sql);
                            if (isset($student_answers)) echo "Your answers:";
                            else echo "no";
                            for ($i = 0; $i < count($student_answers); $i++) {
                                echo "<li>" . $student_answers[$i] . "\t" . "</li>";
                            }
                        }
                        ?>


                    </div>
                    <div class="col-md-2 rcol">
                        <h4 id="scoreH" class="text-center">
                            Your Score:

                            <?php
                            $sql = "SELECT name, score from student_scores where name = '$full_name' and questionset = '$qs_num' limit 1";
                            $result = $conn->query($sql);
                            $didTest = mysqli_fetch_assoc($result);

                            echo $didTest['score'];

                            ?>
                        </h4>
                        <ul class="list-group" id="answers">
                            <?php if ($didTest) {
                                echo "<h5 class='text-center'><u> Correct Answers</u><h5>";
                                for ($i = 0; $i < count($answers); $i++) {
                                    echo "<li class='list-group-item list-group-item-success'>" . $answers[$i] . "</li>";
                                }
                            }
                            ?>
                        </ul>
                        <script>
                            $(function() {
                                var didTest = <?php echo $didTest ?>;

                                if (didTest) {
                                    $("#submit_rq").prop("disabled", true);
                                    //$(".mcol").hide();
                                }
                            })
                        </script>

                    </div>
                    <footer class="footer">
                        <div class="container">
                            <span>
                                <a href="home.php?logout='1'" class="badge badge-danger">Log out</a>
                                <a class="badge badge-dark" href="getstarted.html">Need help?</a>
                            </span>
                        </div>
                    </footer>
                </div>
            </div>
        <?php endif ?>
        <!-- Teacher mode -->
        <?php if ($u_type ==  "T") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 lcol">
                        <h4 class="text-left">Question Sets</h4>
                        <input type="button" class="text-dark" name="cn" id="cn" value="Create New">
                        <br>
                        <form class="form" action="home.php" method="post">
                            <div id="cntext" class='form-group'>
                                <label for='set_name' class='text-body'>Name of question set:</label><br>
                                <input required type='text' name='set_name' id='set_name'>
                                <input type="submit" class="btn btn-light btn-md" name="cnsubmit" value="Create">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['cnsubmit'])) {
                            $set_name = $_POST['set_name'];
                            $sql = "INSERT into questionset(title)
                            VALUES('$set_name')";
                            $result = $conn->query($sql);
                        }
                        ?>
                        <script>
                            $(function() {
                                $("#cntext").hide();
                            });
                            $("#cn").click(function() {
                                $("#cntext").show();
                            });
                        </script>
                        <?php
                        $sql = "SELECT title FROM questionset";
                        $result = $conn->query($sql);
                        $title = "";
                        if ($result->num_rows > 0) {
                        } else {
                            echo "0 results";
                        }

                        $rowss = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rowss[] = $row['title'];
                        }
                        for ($i = 0; $i < count($rowss); $i++) {
                            echo "<a id = 'qs" . $i . "'class = 'text-body' name = 'qs" . $i . ".'href = 'home.php?qs" . $i . "'> <u>" . $rowss[$i] . "<br> </u> </a>";
                            if (isset($_GET['qs' . $i])) {
                                $title = $rowss[$i];
                                $qsnum = $i++;
                            }
                        }

                        ?>

                        <!-- you will only be logged out if you click logout -->

                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center">Welcome <?php echo $full_name; ?></h4>
                        <!--<h5 class="text-center"> Please Choose a Question Set in the Left Column, or Create a New One </h5> -->
                        <h5 class="text-center">
                            <?php echo $title; ?>
                        </h5>
                        <script>
                            function new_question() {
                                var str = "<div class='form-group'><label for='set_name' class='text-body'>Name of question set:</label><br>input required type='text' name='set_name' id='set_name' ></div><div class='form-group'><label for='q_title' class='text-body'>Question Summary Title:</label><br><input required type='text' name='q_title' id='q_title' ></div><div class='form-group'><label for='q' class='text-body'>Question:</label><br> <input required type='text' name='q' id='q' ></div><div class='form-group'><label for='q_type' class='text-body'>Question type:</label><br><select id='q_type' required  name='q_type'><option name='WA' value='WA'>Word Answer</option><option name='MC' value='MC'>Multiple Choice</option></select></div><div class='form-group'><input name='add' type = 'button' id='add'class='btn btn-light btn-md' value='Add another' onclick = 'new_question()' ></div>"
                                document.write(str);
                            }
                        </script>
                        <?php

                        if (isset($_GET['qs' . $qsnum++])) {
                            $sql = "SELECT * FROM question
                                where question_set = $qsnum";
                            $results = $conn->query($sql);
                            if ($results->num_rows == 0) {
                                echo 'no records';
                            }

                            //  else echo "<ol class='choices'>";
                            while ($row = mysqli_fetch_assoc($results)) {
                                echo "<label>" . $row['question_id'] . "<b> Title: </b>" . $row['title'] . " <b>Question: </b>\n" . $row['content'] . " <b>Answer: </b>" .
                                    $row['answer'] . "<b> Points: </b>" . $row['points'] .
                                    "<b> Type: </b>" . $row['question_type'] . "</label>";

                                $qnum = $row['question_id'];
                                $qtype = $row['question_type'];
                            }
                            $mehhh = $qsnum - 1;
                            /*
                            echo "<div class='form-group'><form class='form' action = 'home.php?qs" . $mehhh . "' method='post'>
                            <br> 
                            <label for='sel_q'>Delete a question</label><br>
                                <input required type='number' name='sel_q' id='sel_q'>
                                <input type='submit' class='bg-danger' name='del_q' id='del_q' value='Delete' class='form-control'>
                            </form></div>";
                            if (isset($_POST['del_q'])) {
                                if (isset($_POST['sel_q'])) {
                                    //echo $qsnum;
                                    $selected_q = $_POST['sel_q'];
                                    $sql = "DELETE from question where question_id = '$selected_q' and question_set = '$qsnum'";
                                    $results = $conn->query($sql);
                                    $sql = "DELETE from choices where question_id = '$selected_q' and question_set = '$qsnum'";
                                    $results = $conn->query($sql);
                                    //echo $selected_q;
                                    if ($results->num_rows == 0) {
                                        // echo 'Question' . $selected_q . " successfully deleted";
                                    }
                                    if ($results->error) echo "That question may not exist";
                                }
                            }
                            */
                            /*
                           
                            */

                            $abc = $qsnum - 1;
                            echo "<br> <input type='button' class='text-dark' onclick = 'showQtype()'name='add_q' id='add_q' value='Add to this set'>";

                            echo "
                            <form class='form' action = 'home.php?qs" . $abc . "' method='post'>
                            <div class='form-group' id = 'qform'  >
                                <label for='new_q' class='text-body'>Whats the question type</label><br>
                                <select id = 'select_q' name = 'select_q'>
                                <option name='MC' value='MC'>Multiple Choice</option>
                                <option name='WA' value='WA'>Word Answer</option>
                                </select><br>
                                <label for='qNum' class='text-body'>Question Number?</label>
                                <input required type='number' name='qNum' id='qNum'><br>
                                <input type = 'button' class='btn btn-light btn-md' id = 'subqtype' onclick = 'showChoices()' name = 'subqtype' value = 'Next'>
                                </div>";

                            echo "
                                <div id='choiceFields' class='form-group'> 
                                
                                      <label for='choice1' class='text-body'>Choice 1:&nbsp</label>
                                      <input  type='text' name='choice1' id='choice1'><br>
                                      <label for='choice2' class='text-body'>Choice 2:</label>
                                      <input  type='text' name='choice2' id='choice2'><br>
                                      <label for='choice3' class='text-body'>Choice 3:</label>
                                      <input  type='text' name='choice3' id='choice3'><br>
                                      <label for='choice4' class='text-body'>Choice 4:</label>
                                      <input  type='text' name='choice4' id='choice4'>
                                      <input type = 'button' class='btn btn-light btn-md' name = 'choiceSubmit' onclick = 'proceed()' value = 'Next'>
                                
                                  </div>";
                            echo "
                                <div id='pOptions' class='form-group'> 
                                      <label for='qtitle' class='text-body'>Title</label>
                                      <input required type='text' name='qtitle' id='qtitle'>
                                      <label for='qcontent' class='text-body'>Content:</label>
                                      <input required type='text' name='qcontent' id='qcontent'><br>
                                      <label for='qanswer' class='text-body'>Answer:</label>
                                      <input required type='text' name='qanswer' id='qanswer'>
                                      <label for='qpoints' class='text-body'>Points</label>
                                      <input required type='text' name='qpoints' id='qpoints'>
                                      <input type = 'submit' class='btn btn-light btn-md' name = 'pSubmit' value = 'Finish'>
                                  
                                  </div></form>";
                            /*     
                            echo "<form class='form' action = 'home.php?qs" . $abc . "' method='post'>
                            <br> <input type='submit' class='bg-danger' name='del_set' id='del_set' value='Delete this set'>
                            </form>";
                            
                            if (isset ($_POST['del_set'])){
                                $sql = "DELETE from questionset where questionset_id = '$qsnum'";
                                $result = $conn->query($sql);
                                
                                header('location: home.php');
                            }
                            */
                            if (isset($_POST['pSubmit'])) {
                                /*
                                if (isset($qsnum))
                                    echo '<h1>' . $qsnum . '<h1>';
                                else echo '<h1>poop<h1>';
                                */


                                $question_type = $_POST['select_q'];
                                $q_num = $_POST['qNum'];
                                $qtitle = mysqli_real_escape_string($conn, $_POST['qtitle']);
                                $qcontent = mysqli_real_escape_string($conn, $_POST['qcontent']);
                                $qanswer = mysqli_real_escape_string($conn, $_POST['qanswer']);
                                $qpoints = $_POST['qpoints'];
                                // debugging --> echo $question_type . $q_num . $qtitle . $qcontent . $qanswer . $qpoints . "\t" . $qset;
                                // echo $question_type .$q_num .$qtitle .$qcontent.$qanswer.$qpoints.$qsnum;
                                $check_sql = "SELECT * from question where question_id = '$q_num' and  question_set = '$qsnum' limit 1";
                                $myresult = $conn->query($check_sql);
                                if ($myresult->num_rows > 0) {
                                    echo "<h6 class='text-danger'> A question already exists at that number.</h6>";
                                } else {

                                    $sql = "INSERT INTO question(question_id , title, question_type , content , answer,  question_set , points )
                                VALUES('$q_num', '$qtitle', '$question_type', '$qcontent', '$qanswer', '$qsnum', '$qpoints');";
                                    $result = $conn->query($sql);
                                    if (!$result) {
                                        echo $question_type . $q_num . $qtitle . $qcontent . $qanswer . $qpoints . $qsnum;
                                        echo "fail";
                                    }
                                    if ($question_type == "MC") {
                                        $choice1 = trim($_POST['choice1']);
                                        $choice2 = trim($_POST['choice2']);
                                        $choice3 = trim($_POST['choice3']);
                                        $choice4 = trim($_POST['choice4']);



                                        $sql =  "INSERT INTO choices(question_set , question_id , choice1 , choice2 , choice3 , choice4 )
                                        VALUES('$qsnum', '$q_num', '$choice1', '$choice2', '$choice3', '$choice4')";
                                        $result = $conn->query($sql);
                                        if (!$result) echo "fail";
                                    }
                                }
                            }
                        }
                        ?>

                        </li>
                        </ol>
                        <script>
                            $(function() {
                                $("#qform").hide();
                                $("#choiceFields").hide();
                                $("#pOptions").hide();
                                /*
                                                                
                                */
                            });

                            function showQtype() {
                                $('#add_q').hide();
                                $("#qform").show();
                            }

                            function showChoices() {
                                $("#qform").hide();
                                if ($("#select_q").val() == 'MC') {
                                    console.log("clickled");
                                    $("#choiceFields").show();
                                } else {
                                    $("#pOptions").show();
                                }
                            }

                            function proceed() {
                                $("#pOptions").show();
                            }
                        </script>

                    </div>
                    <div class="col-md-2 rcol">
                        <h4 class="text-center">Students</h4>
                        <?php
                        $sql = "SELECT * FROM student_scores
                        where questionset = $qsnum";
                        $results = $conn->query($sql);
                        if ($results->num_rows == 0) {
                            echo 'no records';
                        }
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo " 
                                <label>" . $row['name'] . "\t" . $row['score'] .
                                "</label>";
                        }

                        ?>
                    </div>
                    <footer class="footer">
                        <div class="container">
                            <span>
                                <a href="home.php?logout='1'" class="badge badge-danger">Log out</a>
                                <a class="badge badge-dark" href="getstarted.html">Need help?</a>
                            </span>
                        </div>
                    </footer>
                </div>

            </div>
        <?php endif ?>
        <!-- Developer mode -->

        <?php if ($account_type == "Developer") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 lcol">
                        <h4 class="text-left">Developer</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.<br>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            <!-- you will only be logged out if you click logout -->

                        </p>
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center">Welcome <?php echo $first_name; ?></h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                            aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                    </div>
                    <div class="col-md-2 rcol">
                        <h4 class="text-center">hello</h4>
                        <p>Loremipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.<br>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <footer class="footer">
                        <div class="container">
                            <span>
                                <a href="home.php?logout='1'" class="badge badge-danger">Log out</a>
                                <a class="badge badge-dark" href="getstarted.html">Need help?</a>
                            </span>
                        </div>
                    </footer>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
</body>

</html>