<?php include "conn.php"; ?>
<div class="caption-full">

    <!--h4 class="pull-right">$24.99</h4-->
    <h3 class="text-center">
         <p>
                                    <span class="glyphicon glyphicon-share"></span>
           6. ข้อมูลวุฒิการศึกษาที่สมัคร
        </p>
    </h3>
   <br>

<?php if(!isset($_GET["edite"])){ ?>
    <form class="form-horizontal" name="form1" method="post" action="index.php">
  <?php }
      else{ ?>
    <form class="form-horizontal" name="form1" method="post" action="index.php?edite=true">
    <?php } ?>
       


    <div class="form-group form-group-lg ">
            <label class=" col-sm-3 control-label" for="formGroupInputLarge"> สมัครโดยใช้วุฒิ </label>
            <div class="col-sm-7">
                   <?php if(isset($_GET["edite"])){ ?>
                 
                 <select class="form-control input-lg" name="lbGraduate" required="" disabled="true">
                 <?php } else{  ?>
                 <select class="form-control input-lg" name="lbGraduate" required="">
                  <?php } ?>

<?php  if(isset($_SESSION['SAS1'])){    
    echo $_SESSION["EDITE"][25];
                        $checkpage6 = "1";
                        if(strcmp($_SESSION['SAS1'][1], $checkpage6) == 0){ ?>

                 <option value="ป.6"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][25] == "ป.6"){  echo"selected"; }}?>
                 >ประถมศึกษาปีที่ 6</option>
                 <?php } 
                 else{ ?>
                
                 <option value="ม.3"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][25] == "ม.3"){  echo"selected"; }}?>
                 >มัธยมศึกษาปีที่ 3</option>

                 <?php } ?>

           <?php  }else{  // ถ้าไม่มี $_SESSION['SAS1'] 

            echo $_SESSION["EDITE"][25];
           ?>
                <option value="ป.6"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][25] == "ป.6"){  echo"selected"; }}?>
                 >ประถมศึกษาปีที่ 6</option>
               
                 <option value="ม.3"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][25] == "ม.3"){  echo"selected"; }}?>
                 >มัธยมศึกษาปีที่ 3</option>

              <?php  }  ?>
                

                
                </select>
            </div>

            <div class="col-sm-2"></div>
    </div>

   


        <div class="form-group form-group-lg ">
            <label class=" col-sm-3 control-label" for="formGroupInputLarge"> จากสถานศึกษา </label>
            <div class="col-sm-4">
                   
                 <input name="txtLschool" class="form-control input-lg" id="lschool" 
                    placeholder="ชื่อโรงเรียนเดิม" type="text" required="" autofocus=""
                  value="<?php if(isset($_SESSION["EDITE"])){ echo $_SESSION["EDITE"][26];}?>"
                    >
            </div>
                <div class="col-sm-4">
               
                 <!--input name="txtSchoolProvince" class="form-control input-lg" id="lschool" 
                    placeholder="โรงเรียนตั้งอยู่จังหวัด" type="text" required="" autofocus=""
                  value="<?php // if(isset($_SESSION["EDITE"])){ echo $_SESSION["EDITE"][45];} ?>"
                 -->
    <?php       echo "<select name='lbPROVINCE_SC' class=\"form-control input-lg\" required=''>";
                echo "<option value=''>- เลือกจังหวัด -</option>\n";
                $resultprovince=mysql_query("select * from province order by PROVINCE_NAME");

                 while($rowpro = mysql_fetch_array($resultprovince)){ ?>
                        <option value="<?php echo $rowpro["PROVINCE_NAME"];?>"
    <?php if(isset($_SESSION["EDITE"])){ if(strcmp($_SESSION["EDITE"][45], $rowpro["PROVINCE_NAME"]) == 0)  { echo"selected"; } } ?> > <?php echo $rowpro["PROVINCE_NAME"]; ?>
                        </option> 
                <?php } ?>   
                </select>

            </div>
            <div class="col-sm-1"> </div>
 
        </div>

         <div class="form-group form-group-lg ">
            <label class=" col-sm-3 control-label" for="formGroupInputLarge"> เกรดเฉลี่ยสะสม </label>
            <div class="col-sm-7">
                   
                 <input name="txtGPA" class="form-control input-lg" id="gpa" 
                    placeholder="GPA" type="text" required="" autofocus="" maxlength="4" 
                    OnKeyPress="return chkNumberAndDot(this)"
                    value="<?php if(isset($_SESSION["EDITE"])){ echo $_SESSION["EDITE"][27];}?>"
                    >
            </div>

            <div class="col-sm-2"> </div>
 
        </div>

        <div class="caption-full">




<!--h4 class="pull-right">$24.99</h4-->
<!--
<h3 class="text-center">
     <p>
                                <span class="glyphicon glyphicon-share"></span>
       6.1 โรงเรียนที่ประสงค์เข้าเรียนเป็นการสำรอง
</h3>
<div class="alert alert-danger text-center" role="alert">
		<i><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ส่วนนี้กรุณาระบุชื่อโรงเรียนที่ประสงค์เข้าเรียนเป็นการสำรอง ที่ไม่ใช่โรงเรียนบางละมุง</i>
    </div>

<br>         

<div class="form-group form-group-lg ">
            <label class=" col-sm-3 control-label" for="formGroupInputLarge"> ระบุชื่อโรงเรียน </label>
            <div class="col-sm-7">
                   

            <select class="form-control input-lg" name="txtschoolsecond" id="schoolsecond" required="">
            <option value="">-- กรุณาเลือก --</option>       
            <option value="โรงเรียนสิงห์สมุทร"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนสิงห์สมุทร"){  echo"selected"; }}?>
                 >โรงเรียนสิงห์สมุทร
            </option>
            <option value="โรงเรียนสัตหีบวิทยาคม"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนสัตหีบวิทยาคม"){  echo"selected"; }}?>
                 >โรงเรียนสัตหีบวิทยาคม
            </option>
            <option value="โรงเรียนศรีราชา"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนศรีราชา"){  echo"selected"; }}?>
                 >โรงเรียนศรีราชา
            </option>
            <option value="โรงเรียนผินแจ่มวิชาสอน"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนผินแจ่มวิชาสอน"){  echo"selected"; }}?>
                 >โรงเรียนผินแจ่มวิชาสอน
            </option>       
            <option value="โรงเรียนโพธิสัมพันธ์พิทยาคาร"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนโพธิสัมพันธ์พิทยาคาร"){  echo"selected"; }}?>
                 >โรงเรียนโพธิสัมพันธ์พิทยาคาร
            </option>    
            <option value="โรงเรียนทุ่งศุขลาพิทยา(กรุงไทยอนุเคราะห์)"
                 <?php if(isset($_SESSION["EDITE"])){if($_SESSION["EDITE"][55] == "โรงเรียนทุ่งศุขลาพิทยา(กรุงไทยอนุเคราะห์)"){  echo"selected"; }}?>
                 >โรงเรียนทุ่งศุขลาพิทยา(กรุงไทยอนุเคราะห์)
            </option>          
      

            </select>



                 <!--input name="txtschoolsecond" class="form-control input-lg" id="schoolsecond" 
                    placeholder="ระบุชื่อโรงเรียนสำรอง" type="text" required="" autofocus=""  
                    value="<?php //if(isset($_SESSION["EDITE"])){ echo $_SESSION["EDITE"][55];}?>"
                    > 
            </div>

            <div class="col-sm-2"> </div>
 
        </div>!-->

                    
         <?php if(!isset($_GET["edite"])){ ?>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4 text-center">
                <button class="btn btn-info btn-lg btn-block" name="btnNext6" 
                type="submit" value="Login">
                    ถัดไป   <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <?php }else{ ?>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4 text-center">
                <button class="btn btn-success btn-lg btn-block" name="btnEdite6" 
                type="submit" value="Login"
              onclick="if(confirm('ยืนยันการแก้ไขส่วนที่6')) return true; else return false;"
                >
                    แก้ไขส่วนที่ 6   <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                </button>
            </div>
        </div>
            <?php } ?> 
    </form>
</div>
