<?php
session_start();

if (isset($_POST["login"], $_POST['txtRegisno'], $_POST['txtPwd'])) {
    include "conn.php";
 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>
        TNW Admission 2020
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pattaya|Pridi|Prompt|Sriracha" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </link>
    </link>
    </link>
    </meta>
    </meta>
    </meta>
    </meta>
    </meta>
    <!--script Datepicker-->
    <link href="datepicker/css/datepicker.css" rel="stylesheet" media="screen">

    <style type="text/css">
    #verify_math {
        display: block;
        height: 21px;
    }

    #verify_math span {
        display: block;
        height: 21px;
        width: 30px;
        position: relative;
        float: left;
        text-align: center;
        line-height: 20px;
        color: #000;
    }

    #verify_math span.digital {
        background: url(img/digi_img.jpg) left top no-repeat;
    }

    .big-checkbox {
        width: 30px;
        height: 30px;

    }
    </style>
    <script src="js/country.js"></script>
    <script language=Javascript>
    window.onLoad = dochange('province', -1);
    </script>



</head>

<body onload="remainLength();">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"
        style="border-bottom:#fcc6d3 2px solid; background:#c7254e;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
                    type="button">
                    <span class="sr-only">
                        Toggle navigation
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                </button>
                <a class="navbar-brand navbar-nav" href="#">
                    <span class="glyphicon glyphicon-fire">
                    </span>
                    Student Admission System
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="navbar-nav" href="http://www.tnw.ac.th" target="_blank">
                            <span class="glyphicon glyphicon-globe">
                            </span>
                            ????????????????????????????????????????????????????????????????????????
                        </a>
                    </li>
                    <li>
                        <a class="navbar-nav" href="chdate.html" target="_blank">
                            <span class="glyphicon glyphicon-modal-window">
                            </span>
                            ????????????????????????????????????????????????????????????????????????
                        </a>
                    </li>

                    <?php if (isset($_SESSION["Role"])) {
                            if ($_SESSION["Role"] == 1) {?>
                        <li>
                            <a class="navbar-nav" href="admin/user">
                                <span class="glyphicon glyphicon-globe">
                                </span>
                                ??????????????????????????????????????????????????????????????????????????????????????????
                            </a>
                        </li>

                            <?php }
                    }?>

                </ul>
                <?php if (isset($_SESSION["RegisNO"])) {?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="navbar-nav" href="index.php?ses=destroy"
                            onclick="if(confirm('??????????????????????????? Logout & Reset')) return true; else return false;">
                            ??????????????????????????????????????? : <?php echo $_SESSION["RegisNO"]; ?>
                            <span class="glyphicon glyphicon-remove-sign">
                            </span> Logout
                        </a>
                    </li>
                </ul>
                <?php }
                if (isset($_GET["ses"]) && $_GET["ses"] == "destroy") {
                    echo "<script type=\"text/javascript\">";
                    echo "window.location=\"index.php\" ";
                    echo "</script>";
                    session_destroy();
                }
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> <!-- End navigation top menu -->

    <!-- Page Content --> 
    <div class="container">
        <div class="row">
            <div class="col-md-3">


                            <div class="list-group">
                                <p class="list-group-item "
                                    style="background-color:#c7254e;border-bottom:#fcc6d3 2px solid; background:#c7254e; color: #fff; ">
                                    <span class="glyphicon glyphicon-education">
                                    </span>
                                    <script src="js/country.js"></script>
                                    ?????????????????????????????????????????????????????????????????? Online
                                </p>
                                
                                <div class="list-group-item" style="background-color: #fcf6a3;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-send"></span>
                                        ??????????????????????????? ???.1
                                    </div>
                                    <div class="text-right">

                                        <span class="glyphicon glyphicon-user"></span>                                        
                                        <span id="showDataM1"> </span>
                                    </div>
                                </div>
                                
                                <div class="list-group-item" style="background-color: #fcf6d9;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ???????????????????????????????????? ???
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM12"> </span>
                                    </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fcf6d9;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ??????????????????????????????????????? ???
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM11"> </span>
                                    </div>
                                </div>
                               


                                <div class="list-group-item" style="background-color: #FAB9CD;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-send"></span>
                                        ??????????????????????????? ???.4
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM4"> </span>
                                    </div>
                                </div>
                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ?????????????????????????????????-??????????????????????????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM41"> </span>
                                    </div>
                                </div>
                                
                                <div class="list-group-item" style="background-color: #fce8ee;">
                                        <div style="float: left;">
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                            ?????????????????????????????????-?????????????????????????????????
                                        </div>
                                        <div class="text-right">
                                            <span class="glyphicon glyphicon-user"></span>
                                            <span id="showDataM42">  </span>
                                        </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ??????????????????-?????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM43"> </span>
                                    </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ??????????????????-?????????????????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM44"> </span>
                                    </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ??????????????????-????????????????????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM45"> </span>
                                    </div>
                                </div> 

                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ??????????????????-??????????????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM46"> </span>
                                    </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fce8ee;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        ?????????-???????????????
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataM47"> </span>
                                    </div>
                                </div>

                                <div class="list-group-item" style="background-color: #fcf762;">
                                    <div style="float: left;">
                                        <span class="glyphicon glyphicon-thumbs-up"></span>
                                        <B>??????????????????????????????</B>
                                    </div>
                                    <div class="text-right">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span id="showDataAll"> </span>
                                    </div>
                                </div>
                            </div> <!-- list-group report student -->

                            

            </div> <!-- end col-md-3 -->


        </div> <!-- /.end row -->
    </div> <!-- /.end container -->
    <!-- end -->

    <!-- Footer --> 
    <div class="container">
        <hr>  
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
                        ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? </br>
                        Copyright ?? ICT Banglamung School
                    </p>
                </div>
            </div>
        </footer>
        </hr>
    </div>
    <!-- /.container footer -->
    <!-- End footer -->                                     

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js">
    </script>
    <script src="js/number_only.js">
    </script>
    <script src="js/remainlength.js">
    </script>
    
    <!-- datepicker js -->
    <!--script src="js/jquery.js"></script-->
    <!--script src="//getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script-->
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script src="datepicker/js/bootstrap-datepicker-thai.js"></script>
    <script src="datepicker/js/locales/bootstrap-datepicker.th.js"></script>
    <script src="js/validator.js"></script>
    <script src="js/sc.js"></script>

    <script type="text/javascript">
    $(function() {
        setInterval(function() { // ??????????????????????????????????????? javascript ????????????????????????????????? ??? 30 ??????????????????

        }, 1000);
    });
    </script>

    <script type="text/javascript">
    $(function() {
        setInterval(function() { // ??????????????????????????????????????? javascript ????????????????????????????????? ??? 30 ??????????????????
            $.getJSON("fn_statistic.php", function(data) {
                // if(data!=null && data.length>0){ // ?????????????????????????????????
                // ???????????????????????????????????????????????????????????????????????????????????????????????????????????????
                $("span#showDataM1").html(data[0].one);     // ???.1 ?????????????????????
                $("span#showDataM12").html(data[0].two);    // ???.1 ???????????????
                $("span#showDataM11").html(data[0].three);  // ???.1 ??????????????????
                $("span#showDataM13").html(data[0].four);   // Coming soon
                $("span#showDataM14").html(data[0].five);   // Coming soon

                // ??????????????? ???.4
                $("span#showDataM4").html(data[0].six);     //???.4 ?????????????????????
                $("span#showDataM41").html(data[0].seven);  //??????????????????-???????????????
                $("span#showDataM42").html(data[0].eigth);  //??????????????????-????????????
                $("span#showDataM43").html(data[0].nine);   //?????????
                $("span#showDataM44").html(data[0].ten);    //????????????????????? 
                $("span#showDataM45").html(data[0].eleven); //????????????????????????
                $("span#showDataM46").html(data[0].twelve); //??????????????????
                $("span#showDataM47").html(data[0].thirteen); //?????????-???????????????
                $("span#showDataAll").html(data[0].fourteen);     //?????????????????????
                // ???????????????????????????????????????????????????????????????????????? json ????????? ???????????? $.each() ????????????????????????
                //$.each(data,function(i,k){
                // $("#showData").append(data[i].province_name+"<br>");
                //});
                //}
            }).responseText;
        }, 3000);
    });
    </script>

    <script type="text/javascript">
    function KeyCode(objId) {
        if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode >= 65 && event.keyCode <=90) 
            //48-57(??????????????????) ,65-90(Eng ???????????????????????????????????? ) ,97-122(Eng ????????????????????????????????????)
        {
            return true;
        } else {
            //alert("???????????????????????????????????? a-z ????????? 0-9");
            return false;
        }
    }
    </script>
    <?php

if (isset($_SESSION["Role"])) {
    if ($_SESSION["Role"] == 1) {
        include './excel/exportexceljack.php';
    }
}
?>
</body>

</html>