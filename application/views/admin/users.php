<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidemenu'); ?>
<div class="content">
    <div class="content-header">
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
                <li><a>Manage Users</a></li>
            </ul>
        </div>
    </div>
    <div class="row animated fadeInUp">
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-xs-10">
                    <h3 class="page-heding-title">

                    </h3>
                </div>
                <div class="col-xs-2">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="<?=base_url('admin/users/add-user')?>" class="btn btn-wide btn-primary btn-sm pull-right">Add New User</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->flashdata('success_msg')){ ?>
            <!--<div class="alert alert-success fade in">
    <a href="javascript:void(0);" class="close" data-dismiss="alert">×</a>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    <?=$this->session->flashdata('success_msg')?>
</div>-->
            <?php } ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($users)) {
                                    $i = 1;
                                    foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=stripslashes($user['name'])?></td>
                                    <td><?=stripslashes($user['email'])?></td>
                                    <td><?=stripslashes($user['gender'])?></td>
                                    <td>
                                        <?php
                                    if($user['login_type'] == 1){
                                        print 'User';
                                    } else {
                                        print 'Performer';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" id="<?=$user['id']?>" class="change-status" data-table="users" data-url="admin/services/change_status" title="Status | Green:Active, Red:InActive">
                                            <?php if($user['status'] == 1){ ?>
                                            <span class="glyphicon glyphicon-ok-sign green-check-icon"></span>
                                            <?php } else { ?>
                                            <span class="glyphicon glyphicon-remove-sign red-check-icon"></span>
                                            <?php } ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?=base_url('admin/users/edit-user/'.$user['id'])?>" title="edit"><i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
<script src="<?=base_url()?>backend/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>backend/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>backend/javascripts/examples/tables/data-tables.js"></script>
