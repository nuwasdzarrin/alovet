<style type="text/css">
.odd-gradeX td form button {
    margin: 2px 2px 2px 2px; 
    float: left;
    display:inline-block;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Semua Pegawai</div>
            
            <div class="card-body">
                <button class="add-user btn btn-success" data-name="" data-email="" data-role="" data-pass="" data-re_pass="" style="margin: 0 0 10px 10px;"> Add User </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Pegawai</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Pegawai</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Control</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($user->result() as $us) { ?>
                                <tr>
                                    <td><?php echo $us->id; ?></td>
                                    <td><?php echo $us->name;?></td>
                                    <td class="center"><?php echo $us->email;?></td>
                                    <td class="center"><?php echo $us->password;?></td>
                                    <td class="center"><?php echo $us->role;?></td>
                                    <td class="center">
                                        <button class="edit-user btn btn-info fa fa-edit" data-id="<?php echo $us->id;?>" data-username="<?php echo $us->name;?>" data-email="<?php echo $us->email;?>" data-role="<?php echo $us->role;?>" data-pass="" title="Edit User"> </button>
                                        <form method="POST" action="<?php echo site_url('user/delet')?>">
                                            <input type="hidden" name="id" value="<?php echo $us->id;?>">
                                            <button type="submit" title="Hapus Data" class="btn btn-danger fa fa-trash-o" ></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('register')?>">
                    <?php echo form_open('register');?>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label class="control-label" for="title">Nama Pegawai:</label>
                                    <input type="text" class="form-control" id="name" name="name" style="width: 150px" value="<?php echo set_value('name'); ?>" required>
                                    <p> <?php echo form_error('name'); ?> </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label class="control-label" for="title">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
                                    <p> <?php echo form_error('email'); ?> </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label class="control-label" for="content">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" required>
                                    <p> <?php echo form_error('password'); ?> </p>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label" for="content">Re-Enter Password:</label>
                                    <input type="password" class="form-control" id="re-password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" required>
                                    <p> <?php echo form_error('password_conf'); ?> </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label class="control-label" for="content">Role:</label>
                                    <label class="radio-inline"><input type="radio" name="rolea" value="MEMBER" checked>Member</label>
                                    <label class="radio-inline"><input type="radio" name="rolea" value="ADMIN">Admin</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Input</button>
                    </div>
                    <?php echo form_close();?>
                </form>
            </div>
        </div>
    </div>

   

    <script type="text/javascript">
    //js for modal add user
    $(document).on('click', '.add-user', function() {
        $('.modal-title').text('Add New User');
        $('#name').val($(this).data('name'));
        $('#email').val($(this).data('email'));
        $('#pass').val($(this).data('password'));
        $('#re_pass').val($(this).data('re-password'));
        $('#role').val($(this).data('rolea'));
        $('#addUser').modal('show');
    });
    //js for modal edit user
    /*$(document).on('click', '.edit-user', function() {
        $('.modal-title').text('Edit User');
        $('#id').val($(this).data('id'));
        $('#id_emp').val($(this).data('id_emp'));
        $('#username').val($(this).data('username'));
        $('#email').val($(this).data('email'));
        $('#unit').val($(this).data('unit'));
        $('#pass').val($(this).data('password'));
        $('#role').val($(this).data('role'));
        $('#editUser').modal('show');
    });*/
</script>
