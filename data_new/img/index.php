<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>FICS-Profile Questionnaire</title>
    <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  background-image: url("/img/fics_bg_sm.png");
   background-repeat: no-repeat;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

.tabyty {
    background-image: url('/img/fics_bg_sm.png');
}
</style>
  </head>
  <body>
      <nav class="navbar navbar-light" style="background-color: #ffffff;">
 <div class="container-md">
<a class="navbar-brand" href="#">
      <img src="/img/fics_bg_sm.png" alt="" width="160" height="67">
    </a>
  </div>
</nav>
<div class="container">
   <form id="regForm" action="complete.php" method="post">
  <h1>Questionnaire</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><p class="fw-bold">Instructions:</p>
    <p>Below is a selection of questions:
In each question you are required to choose the sentence that best describes you, in order
of preference, down to the sentence that least describes you.</p>
  </div>
  <div class="tab"><p class="fw-bold">Contact Info:</p>

  <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="fname" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="lname" placeholder="Last name" aria-label="Last name">
  </div>
</div>
  <div class="row">
      
      <?php
   $num = rand();
  echo" <p><input  name='ref' value ='".$num."' hidden ></p>";
  ?>
  </div>
  <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="email" placeholder="E-mail" aria-label="email">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="phone" placeholder="Contact Number" aria-label="Contact Number">
  </div>
</div>
    
  
  
  
  </div>
 <div class="tab"><p class="fw-bold">Test:</p>

  <div class="row">
    

 
 <div class='selecter5'>
<select name='sel1'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select>

<select name='sel2'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select>
<select name='sel3'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select>

<select name='sel4'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select>
<h2>result <span class='resultAppend'></span></h2>
</div> 
   <div id="myDIV5" style="display: none">
        
        <div style="overflow:auto;float:right">
    
       <p><b>Note:</b> The element will not take up any space when the display property set to "none".</p>
      <button class="btn btn-primary active" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    
  </div> </div>
 
  
  <script> 
  $('select').change(function(){
var sum5 = 0; 
$('.selecter5').find(":selected").each(function(){
console.log($(this).val());
		sum5 = sum5 +  parseInt($(this).val());
    console.log(sum5);
   
    
    
   var x = document.getElementById("myDIV5");
  if (sum5 == 10) {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }  
});
}); 
 </script>
</div>
    
  
  
  
  </div>




<br>

<?php

// Get the contents of the JSON file 
$filename = file_get_contents("data/questions.json");
$filename_2 = file_get_contents("data/questions_2.json");
$array = json_decode($filename, true);
//var_dump($filename_2); // show contents

foreach($array as $key=>$value){
     $qn  = explode("-",$key);
     $qnn  =  $qn[0] ;
    $int_qn = intval( $qnn );
   
    
    
        
        echo "<div class='tab'><div class='selecter1'><div class='row'>
   <div style='text-align: center; vertical-align: middle;' class=' col-4 col-sm-3 text-white bg-success'>
            <h1 class='display-1'>".$int_qn."</h1> </div>   
    <div class='col-sm-8'><p class='fw-bold'> ";
    if ($int_qn < 5) 
        {
              echo "ooo";
        }
            
    else 
        {
                 echo $qn[1];
        };
    echo"</p>";
            $i = 0;
            
                    while($i < count($value))
                    {
                        
                        $itemNum = $i + 1;
                        $itemName = "Q".$int_qn."_".$itemNum;
                    	echo $value[$i]."<div style='overflow:auto;float:right'><select class='4' name='".$itemName."'>
                                    <option value='1'>1 </option>
                                    <option value='2'>2 </option>
                                    <option value='3'>3 </option>
                                    <option value='4'>4 </option>
                            </select></div><br>
                    
                    <hr>";
                    	$i++;
                    }    
    
    
    
  echo "</div>

  </div>
  </div>
  </div>";
    }
    
    
  ?>
  

<?php echo"  ";





?>
  <div class="tab"><p class="fw-bold">In this section please select Yes or No for each of the following questions:</p>
  
  <table class="table table-striped table-sm">
  
  <?php 
    $array_2 = json_decode($filename_2, true);
    foreach($array_2 as $key=>$value){
   
    
     
  echo "<tr><td><b>".$key."</b></td><td>".$value."</td><td><div class='form-check form-check-inline'>
  <input class='form-check-input' type='radio' name='Options".$key."'  id='inlineRadio1_".$key."' value='1'>
  <label class='form-check-label' for='inlineRadio1_".$key."'>Yes</label>
</div>
<div class='form-check form-check-inline'>
  <input class='form-check-input' type='radio' name='Options".$key."'  id='inlineRadio2_".$key."' value='0'>
  <label class='form-check-label' for='inlineRadio2_".$key."'>No</label>
</div>

</td></tr>";
 }
    ?>
</table>
  
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
    
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
   <?php   
      foreach($array as $key=>$value){
    echo "<span class='step'></span>";
    
      }
    ?>
  </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </div>
  
  
  <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
  </body>
</html>