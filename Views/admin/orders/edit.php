<?php
include_once VIEWS.'shared/admin/header.php';
?>
<div class="page-content">
   <div class="row">
        <div class="col-md-3">
        <?php
          include_once VIEWS.'shared/admin/_aside.php';
        ?>
        </div>
      <div class="col-md-9">
        <div class="content-box-large">
          <div class="panel-heading">
                <div class="panel-title"><?= $title;?></div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                </div>
          </div>
          <form class="form-horizontal" role="form" id="idForm" method="POST">

            <div class="panel-body">

                <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label"> Имя клиента</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $order['first_name']?>">
                        </div>
                </div>
                <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label"> Телефон клиента</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $order['user_phone']?>">
                        </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Статус заказа</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control">
                        <option value="1" <?php if($order['status'] == 1) echo 'selected'?>>Новый</option>
                        <option value="2" <?php if($order['status'] == 2) echo 'selected'?>>В обработке</option>
                        <option value="3" <?php if($order['status'] == 3) echo 'selected'?>>Доставляется</option>
                        <option value="4" <?php if($order['status'] == 4) echo 'selected'?>>Закрыт</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button id="save" type="submit" class="save btn btn-primary">Update Order</button>
                </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php
include_once VIEWS.'shared/admin/footer.php';
