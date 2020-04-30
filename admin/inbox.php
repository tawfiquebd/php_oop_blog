<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        View Messages
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Message Lists</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>All others</td>
                                                <td><a href="editmessage.html">Edit</a> | <a href="deletemessage.html">Delete</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>


                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


<?php include_once 'inc/footer.php';?>