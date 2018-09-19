<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Orders</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Orders List </h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($orders)){ ?>
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Order.No.</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Packed Done</th>
                  <th>Despatched</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
              <thead>
              <tbody>
                <?php foreach($orders as $orderslist){ ?>
                <tr>
                  <td><?php echo $orderslist->ord_reference_id;?></td>
                  <td>
                    <?php $date = $orderslist->ord_created;
                          $newDate = date('d-m-Y', strtotime($date));
                          echo $newDate;
                    ?>
                  </td>
                  <td><?php echo $orderslist->pro_title;?></td>

                  <td>
                   <input type="hidden" name="ordid" value="<?php echo $orderslist->ord_id;?>">
                    <?php if(($orderslist->ord_photo_packed)=="1"){?>
                      <a href="#" class="photoPackedYes" id="photoPackedYes" ordYes="1"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_packed)=="0"){ ?>
                      <a href="#" class="photoPackedNo" id="photoPackedNo" ordNo="0"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoPackedYes" id="photoPackedYes" ordYes="1"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoPackedNo" id="photoPackedNo" ordNo="0"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>

                  <td>
                    <input type="hidden" name="ordid" value="<?php echo $orderslist->ord_id;?>">
                    <?php if(($orderslist->ord_photo_despatched)=="1"){?>
                      <a href="#" class="photoDespatchedYes" id="photoDespatchedYes" ordYes="1"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_despatched)=="0"){ ?>
                      <a href="#" class="photoDespatchedNo" id="photoDespatchedNo" ordNo="0"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoDespatchedYes" id="photoDespatchedYes" ordYes="1"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoDespatchedNo" id="photoDespatchedNo" ordNo="0"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>

                  <td>Dummy Text Remark</td>

                  <td>
                    <a href="#"><span class="badge bg-green"><i class="fa fa-edit"></i></span></a>
                    <a href="javascript:(void)"><span class="badge bg-red disable" disable="<?php echo $orderslist->ord_id?>"><i class="fa fa-trash"></i></span></a>
                  </td>

                </tr>
                <?php } ?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <?php }else{ ?>
                <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
            <?php } ?>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

