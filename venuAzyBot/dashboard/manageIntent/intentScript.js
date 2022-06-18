
        var pattern = 1;
        var response = 1;
        var patternCounter = 2;
        var responseCounter = 2;
        var patternArrayCount = 0;
        var responseArrayCount = 0;
        var tag = "";
        var context = "";
        const patternText  = [];
        const responseText = [];
    $(document).ready(function(){
        
        $("#addButton").click(function(){
            $('#dynamic_field').append('<tr id="row'+pattern+'"><td><input type="text" required name="pattern'+pattern+'" id="patternTextbox' + patternCounter + '" placeholder="Enter another Pattern" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+pattern+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            patternCounter++;
            pattern++;
        });
        $("#addResponseButton").click(function(){
            $('#dynamic_response_field').append('<tr id="row'+response+'"><td><input type="text" required name="response'+response+'" id="responseTextbox' + responseCounter + '" placeholder="Enter another Response" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+response+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            responseCounter++;
            response++;
        });
        $(document).on('click','.btn_remove',function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
        $("#getButtonValue").click(function(){
            //alert("somebody clickedc");
            var msg = '';
            tag = $('#tagTextbox').val();
            context = $('#contextTextbox').val();
           
            for(i=1; i<patternCounter; i++){
            //msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
            msg += $('#patternTextbox' + i).val() + ",";
            patternText[patternArrayCount] = $('#patternTextbox' + i).val();
            // console.log(patternText);
            patternArrayCount++;
            }
           
            for(i=1; i<responseCounter; i++){
            //msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
            msg += $('#responseTextbox' + i).val() + ",";
            responseText[responseArrayCount] = $('#responseTextbox' + i).val();
            responseArrayCount++;
            }
            // alert(msg); 
            //console.log(tag+patternText+"000000000"+responseText+context);  

            $.ajax({
                url: 'ajaxAddIntent.php',
                type:'post',
                dataType: 'json',   
                data: {tag: tag,pattern: patternText,response: responseText,context:context},
                // data: {tag,patternText,responseText,context},
                //data: {tag},
                success: function(dataCheck){
                    console.log("result form file"+dataCheck)
                    if(dataCheck == 1){
                        $("#statusAdminLogMsg").html('<button id="success" class="btn btn-outline-success btn-lg btn-block">Success</button>');   
                    }
                    else{
                        $("#statusAdminLogMsg").html('<small class="alert alert-danger">00000000000000000000000000000000000000000000000000000</small>');   
                    }
                }
            });
        });
    });

