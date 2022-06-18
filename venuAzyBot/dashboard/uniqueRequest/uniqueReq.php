

<?php
include "../header.php";
?>

<?php
$json = file_get_contents('../../pyconnectphp/request.json');
$json_data = json_decode($json,true);

$json_pretty = json_encode($json_data , JSON_PRETTY_PRINT);
$obj = json_decode($json);
$arraySize = sizeof($json_data['intents']);
$i = 0;
for($i; $i<$arraySize; $i++){
$request = $json_data['intents'][$i]['request'];

?>
<div class="col-auto">  

<span><?php echo $request;?></span>
</div>
 
<?php  
}
?>


            
<!-- <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Layout</h3>
                <p class="text-subtitle text-muted">Multiple form layout you can use</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12"> -->
<?php


?>
    <!-- Basic Horizontal form layout section start -->
    
                <!-- <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Horizontal Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Tag</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control card-title" name="fname"
                                                placeholder="<?php echo $request;?>" readonly>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
           
    <!-- // Basic Horizontal form layout section end -->


<?php

include "../footer.php"
?>
 </div>
        </div>
    </section>