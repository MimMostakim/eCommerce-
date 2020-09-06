@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add User Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(Session::get('message'))
            <div class="offset-2 col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif
    <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="offset-2 col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('user')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" class="form-control" name="photo" >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option>---Select Role---</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Moderator</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection