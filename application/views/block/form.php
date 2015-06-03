<div class='page-header'>
    <h1><?=$title ?></h1>
</div>
<div class='col-sm-5 col-sm-offset-1'>
    <form action=<?=site_url($addr)?> method='POST' class='form-horizontal' role='form'>
        <fieldset>
        <?php foreach ($content as $row):?>
            <div class='form-group'>
                <label class='col-sm-2 control-label' for='username'>昵称 (必填)</label>
                <div class='col-sm-10'>
                    <input type=<?=$row->type?> class='form-control' id=<?=$row->name?>  name=<?=$row->name?> placeholder=<?=$row->holder?> onchange="checkname()" onblur="checkname()">
                    <p class='help-block' id="help-name"><?=$row->hint?></p>
                </div>
            </div>
        <?php endforeach?>
           
          
            <div class='form-actions col-sm-offset-11'>
                <input type='submit' class='btn btn-success btn-large'  value=<?=$title ?>>
            </div>

        </fieldset>
    </form>
</div>