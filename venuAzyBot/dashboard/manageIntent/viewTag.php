
<?php
include "../header.php";
?>

<style>
    .fontawesome-icons {
        text-align: center;
    }

    article dl {
        background-color: rgba(0, 0, 0, .02);
        padding: 20px;
    }

    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>

<?php
$json = file_get_contents('../../dataflair/intents.json');
$json_data = json_decode($json,true);

$json_pretty = json_encode($json_data , JSON_PRETTY_PRINT);
   // echo "<pre>".$json_pretty."<pre/>";  
    // Decode JSON data to PHP object
$obj = json_decode($json);

//echo $json_data['intents'][0]['tag'];
echo "\n";
echo "\n";
echo "\n";
$arraySize = sizeof($json_data['intents']);
$i = 0;
for($i; $i<$arraySize; $i++){
    $tag = $json_data['intents'][$i]['tag'];
    $pattern = $json_data['intents'][$i]['patterns'];
    $response = $json_data['intents'][$i]['responses'];
    $context = $json_data['intents'][$i]['context'];
    ?>
    <!-- <article id="ad"
        class="icon col-6 col-md-3 col-lg-2 pr4 pb2 pt2 bb bw1 b--gray1 hover-black bw0-pr db fl-pr">
        <dl class="dt w-100 ma0 pa0">   
            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name"><?php echo $tag;?></dd>  
        </dl>
    </article>
    <div class="col-auto">  
    <input type="text" class="form-control" placeholder =<?php echo $tag;?>></span>
    </div>
    <div>
    <select class="form-select" id="autoSizingSelect">
      <option selected>
      <?php echo implode(',', $pattern);?>
      </option>
    </select> 
    </div>
    <div>
    <select class="form-select" id="autoSizingSelect">
      <option selected>
      <?php echo implode(',', $response);?>
      </option>
    </select> 
    </div>
    <div>
    <select class="form-select" id="autoSizingSelect">
      <option selected>
      <?php echo implode(',', $context);?>
      </option>
    </select> 
    </div> -->
<?php    
}
?>

            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>TAG</h3>
                <p class="text-subtitle text-muted">These are the Tag used for chatbot training </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tag list</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tag List (<?php echo $i;?>) </h4>
            </div>
            <div class="card-body">
                <div class="row fontawesome-icons">
                    <?php
                    $arraySize = sizeof($json_data['intents']);
                    $i = 0;
                    for($i; $i<$arraySize; $i++){
                        $tag = $json_data['intents'][$i]['tag'];
                        ?>
                        <!-- <article id="ad"
                        class="icon col-6 col-md-3 col-lg-2 pr4 pb2 pt2 bb bw1 b--gray1 hover-black bw0-pr db fl-pr">
                        <dl class="dt w-100 ma0 pa0">   
                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name"><?php echo $tag;?></dd>  
                        </dl>
                    </article> -->
                        <article id="ad"
                        class="icon col-6 col-md-3 col-lg-2 pr4 pb2 pt2 bb bw1 b--gray1 hover-black bw0-pr db fl-pr">
                            <dd class=" btn btn-outline-dark mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name" onclick="getTag('<?php echo $tag;?>')"><?php echo $tag;?></dd>
                        </article>
                    <?php
                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-header" >
                <h4 class="card-title" id = "add_tag_details">
                    <?php
                        if(isset($_REQUEST['name'])){
                            $jsonTagName = $_REQUEST['name'];
                            echo "<script>console.log('Debug Objects: " . $jsonTagName . "' );</script>";
                            for($i; $i<$arraySize; $i++){
                                $tag = $json_data['intents'][$i]['tag'];
                                echo "<script>console.log('Debug Objects: " . $jsonTagName . "' );</script>";
                                if($tag == "thanks"){
                                    $pattern = $json_data['intents'][$i]['patterns'];
                                    $response = $json_data['intents'][$i]['responses'];
                                    $context = $json_data['intents'][$i]['context'];
                                    echo "<script>console.log('Debug Objects: " . $context . "' );</script>";
                                ?>
                                <select class="form-select" id="autoSizingSelect">
                                <option selected>
                                <?php echo implode(',', $pattern);?>
                                </option>
                                </select> 
                                </div>
                                <div>
                                <select class="form-select" id="autoSizingSelect">
                                <option selected>
                                <?php echo implode(',', $response);?>
                                </option>
                                </select>  
                                <?php
                                }                              
                            }
                    }
                    
                    ?>
                </h4>
            </div>
            
            </div>
        </div>
    </section>
</div>

<?php
include "../footer.php";
?>


<script>
    function getTag(tagname){
        
        window.location.href = "viewIntent.php?name="+tagname;
    };
</script>
