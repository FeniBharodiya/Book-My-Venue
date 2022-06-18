<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <body>
        <input type="button" value="callpy" onclick="callingPython()">
    </body>
</html>
<script>
function callingPython(){
    jQuery.ajax({
            url: 'phppythonconnect.php',
            type:'POST',
            data:'txt',
            success:function(result){
               alert(result);          
            }
        });
}
</script>