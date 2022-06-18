<?php
include "../header.php";
?>
           
           <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>ADD INTENTS</h3>
                <p class="text-subtitle text-muted">form layout to add intents</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Intent Form </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Adding Intents</h4>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-warning btn-lg  btn-rounded-pill " onclick="sendButton()" >Train AzyBot</button>
                        </div>
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                        <form method="POST" name="add_intent" id="add_intent">
                <div class="table-responsive">
                    <span id="statusAdminLogMsg"></span>
                    <table class="table table-bordered">
                        <tr>
                            <td><input type="text" name="" placeholder="Enter The Tag" class="form-control" id="tagTextbox"></td>
                        </tr>
					</table>
                    <table class="table table-bordered" id="dynamic_field"> 
						<tr>
							<td><input type="text" name="tag1"   placeholder="Enter the Pattern" class="form-control" id="patternTextbox1" /></td>
                            <td><input type='button' value= "  More Patterns " class="btn btn-success" id='addButton'></td>
							<!-- <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> -->
						</tr>
					</table>
                    <table class="table table-bordered" id="dynamic_response_field"> 
						<tr>
							<td><input type="text" name="response1"   placeholder="Enter the Response" class="form-control" id="responseTextbox1" /></td>
                            <td><input type='button' value= "More Response" class="btn btn-success" id='addResponseButton'></td>
							<!-- <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> -->
						</tr>
					</table>
                    <table class="table table-bordered">
                        <tr>
                            <td><input type="text" name="" placeholder="Enter The Context" class="form-control" id="contextTextbox"></td>
                        </tr>
					</table>
                    <div class="col-12 d-flex justify-content-end">
                        <input type="button" value="Add" name="btnsubmit" id='getButtonValue' class="btn btn-primary me-1 mb-1">
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                    
                </div>
            </form>
                            <!-- <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="First Name" name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Last Name" name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">City</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="City"
                                                name="city-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Country</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                                <label for="checkbox5">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="intentScript.js"></script>
<script src="../../trainAzyBot/train.js"></script>
<script>
    function sendalert(){
    alert("button clicked");
    }
</script>

<?php
include "../footer.php";
?>