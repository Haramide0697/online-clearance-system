
<script type="text/javascript">
    $(document).ready(function(e) {
$("#uploadimage").on('submit' ,(function(e) {
e .preventDefault();
$("#message").empty();
$('#loading').show();
$ .ajax({
url : "control.php" , //Url to which the request issend
type : "POST" , //Type of request to be send,called as method
data : new FormData(this), //Data sent to server, a set of key/value pairs(i.e.form fields and values)
contentType : false, //The content type used when sending data to the server.
cache : false , //To unable request pages to be cached
processData : false, //To send DOMDocument or non processed data file it is set to false
beforeSend : function(){
            $('#loading').show();
        },
success: function(data) //A function to be called if request succeeds
{
$('#loading').hide();
alert(data);
window.location.reload(1);
}
});
}));
// Function to preview image after validation
$(function() {
$("#file").change(function()
{
$("#message").empty(); // Toremove the previous error message
var file = this .files [ 0 ];
var imagefile = file .type ;
var match = [ "image/jpeg" , "image/png" , "image/jpg" ];
if(!((imagefile == match [ 0]) ||(imagefile == match[ 1 ]) || (imagefile == match[ 2 ])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false ;
}
else
{
var reader = new FileReader();
reader .onload = imageIsLoaded ;
reader .readAsDataURL(this.files [0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color" , "green");
$('#image_preview').css("display" , "block");
$('#previewing').attr('src' , e .target .result);
$('#previewing').attr('width' , '120px');
$('#previewing').attr('height' , '120px');
};
});
</script>
        <!-- START MAIN CONTAINER-->
        <div class="col-md-10">
        <div class="progress progress-striped active">
         <div class="progress-bar progress-bar-info" role="progressbar"
         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
         style="width: 30%;">30% Complete
         </div>
        </div>
        <h2>Provide your hostel id card</h2><hr>
    <input type="text" name="iden" style="display: none" value="<?php echo"$identity" ?>" readonly>
<form id ="uploadimage" action ="" method ="post" enctype ="multipart/form-data">
<div id ="image_preview"><img id ="previewing" src ="assets/img/Graphic1.jpg"/></div>
<hr id ="line">
    <div class="row">
        <div class="col-md-4">
    <input type="text" name="id" value="<?php echo "$identity"; ?>" style="display: none;">
    <div class="form-group">
        <label for="dog" >Upload</label>
        <input type="file" name="file2" id="file" class="form-control" accept="image/*">
    </div>
    </div>
    </div>
    <button  class="btn btn-success submit" value="Upload" type="submit" name="submit">Submit</button></a>
    <button class="btn btn-default" type="reset">Reset</button>
    <span id="loading" style="display:none"><img src="<?php echo $base_url; ?>/assets/img/loading.gif"></span>
</form>
</div>