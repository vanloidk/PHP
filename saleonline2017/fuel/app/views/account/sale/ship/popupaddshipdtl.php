<form action="add" method="post">
    <div  class=" col-md-1">
        <button type="submit"  id="btnAbsentModel" value= "save" class="btn btn-primary" data-toggle="modal" data-target="#absentModal">Add</button>

        <div class="modal" id="absentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Product</h4>
                    </div>
                    <div class="modal-body absent-show-body">
                        <!--<div class="row">
                            <span style="border-color: solid;">product order:</span>
                            <?php echo Form::input('product_id', "", array('class' => 'form-control')); ?>
                        </div>-->
                        <div class="row">
                            <span>Name:</span>
                            <?php echo Form::input('product_name', "", array('class' => 'form-control')); ?>
                        </div>

                        <!-- <div class="row">
                             <span>inventory:</span>
                        <?php echo Form::input('inventory', "", array('class' => 'form-control')); ?>
                         </div>
                         <div class="row" id = "d_work_date_replace">
                             <span>inventory(cn nhan):</span>
                        <?php echo Form::input('inventory2', "", array('class' => 'form-control ')); ?>
                         </div>-->

                        <div  class="row">
                            <span>Quantity:</span>
                            <?php echo Form::input('quantity', "", array('class' => 'form-control')); ?>
                        </div>
                        <div  class="row">
                            <span>Price:</span>
                            <?php echo Form::input('price', "", array('class' => 'form-control')); ?>
                        </div>
                    </div>


                    <div class="modal-footer absent_confirm_footer" >
                        <button type="submit" name="save" value="save"  class="btn btn-primary" id ="submitAbsent" >OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>