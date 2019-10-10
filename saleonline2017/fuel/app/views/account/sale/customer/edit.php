<div class="content-customize02" style="padding-top: 15px;">
    <form method="POST" action="" enctype="multipart/form-data" id="formUpload">
        <div class="form-group">
            <?php
            foreach ($customers->delivery as $delivery) {
                
            }
            ?>
            <div class="row row_padding" style="display: none;">
                <div class="col-md-4">
                    <input type="text" name="id" value="<?php echo $customers->id; ?>"class="form-control"/>
                </div>
            </div>

            <div class="row row_padding">
                <div class="col-md-2">
                    <label>Name: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="username" value="<?php echo $customers->username; ?>" class="form-control"/>
                </div>
            </div>

            <div class="row row_padding">
                <div class="col-md-2">
                    <label>Oganization: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="company" value="<?php if (!empty($delivery)) echo $delivery->company; ?>" class="form-control"/>
                </div>
            </div>



            <div class="row row_padding"  style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Phái", 'last_kana', array('class' => 'control-label')); ?>
                </div>
                <div class="col-lg-5 col-lg-offset-0">
                    <?php
                    $genFemale = false;
                    $genMale   = false;

                    if ($delivery->gender == 1) {
                        $genMale = true;
                    } else {
                        $genFemale = true;
                    }
                    //}

                    echo Form::radio('gender[]', 1, $genMale);
                    echo Form::label('Nam', 'gender');
                    echo " ";
                    echo Form::radio('gender[]', 0, $genFemale);
                    echo Form::label('Nữ', 'gender');
                    ?>
                </div>
            </div>




            <div class="row row_padding">
                <div class="col-md-2">
                    <label>date_born: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" name="born_date" value="<?php if (!empty($delivery)) echo date('Y-m-d', strtotime($delivery->born_date)); ?>" class="form-control"/>
                </div>
            </div>

            <div class="row row_padding">
                <div class="col-md-2">
                    <label>Phone: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" name="phone" value="<?php if (!empty($delivery)) echo $delivery->phone; ?>" class="form-control"/>
                </div>
            </div>

            <div class="row row_padding">
                <div class="col-md-2">
                    <label>Address: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="address_1" value="<?php if (!empty($delivery)) echo $delivery->address_1; ?>" class="form-control"/>
                </div>
            </div>
            <div class="row row_padding">
                <div class="col-md-2">
                    <label>Email: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="email" value="<?php echo $customers->email; ?>" class="form-control"/>
                </div>
            </div>
        </div>


        <div class = "row col-md-offset-6" style = "padding-top: 20px;">
            <?php echo Html::anchor('sale/customer/', "Quay lại", array('class' => 'btn btn-warning')); ?>
            <input class = "btn btn-primary" type="submit" value="Cập nhật">
        </div>
    </form>
</div>
<script>
</script>
