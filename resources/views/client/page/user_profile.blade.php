@extends('client.share.master')
<head>
    <title>Quản lí tài khoản</title>
</head>
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User-Profile</title>
</head>
<body>
    <ul class="breadcrumb_">
        <li><a href="index.html">Home</a></li>
        <li><a class="breadcrumb_active" href="#">User-Profile</a></li>
    </ul>
    <div class="container" method="POST">
        <div class="col-4">
            <div class="avatar-user">
                <img width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Avatar user" >
            </div>

            <div class="name-user">
                <h5>Name</h5>
                <span>user@gmail.com</span>
            </div>
        </div>
        <div class="col-6">
            <div class="profile-head">
                <h5 >Personal Information</h5>
            </div>
            <div class="tab-pane fade show active" >
                <div class="row">
                    <div class="col-md-6">
                        <label>User ID</label>
                    </div>
                    <div class="col-md-6">
                        <p>KH01</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Gender</label>
                    </div>
                    <div class="col-md-6">
                        <p>Male</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                    </div>
                    <div class="col-md-6">
                        <p>Customer01</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Email</label>
                    </div>
                    <div class="col-md-6">
                        <p>customer@gmail.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Phone</label>
                    </div>
                    <div class="col-md-6">
                        <p>123 456 7890</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Address</label>
                    </div>
                    <div class="col-md-6">
                        <p>254 Nguyen Van Linh, Da Nang</p>
                    </div>
                </div>
    </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 text-center"><button class="btn btn-warning profile-button" type="button" ><a style="text-decoration:none" href="edit-profile.html">Edit</a></button></div>
        <div class="mt-5 px-2 text-center"><button class="btn btn-white profile-button" type="button">Cancel</button></div>

        </div>
    </div>
    <div class="tablist">
    </div>
</body>

@endsection

