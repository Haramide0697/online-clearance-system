<?php
    if (isset($_POST['submit'])) {
        $iden = $_POST['iden'];
        $bt = $_POST['bt'];
      
        $in = array('sport' => $bt,
                  
        );

        if (empty($bt)) {
            $msg = "Please fill empty field";
        }else{
            (update('clear',$in,'for_id',$iden));

            redirect('?mod=clearance&link=final');
        }

}

?>
        <!-- START MAIN CONTAINER-->
		<div class="col-md-10">
        <div class="progress progress-striped active">
         <div class="progress-bar progress-bar-info" role="progressbar"
         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
         style="width: 40%;">40% Complete
         </div>
        </div>
		<h2>Provide all Informations Required</h2><hr>
    <form method="post"> 
    <input type="text" name="iden" style="display: none" value="<?php echo"$identity" ?>" readonly>
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="bt" >Sport Unique Number</label>
        <input type="text" name="bt" class="form-control" id="bt" placeholder="Number">
    </div>
    </div>
    </div>
    <button class="btn btn-success" name="submit" type="submit">Submit</button>
</form>

</div>