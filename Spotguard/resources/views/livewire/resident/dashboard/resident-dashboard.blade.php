    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">


                                <img src="{{ asset('storage/images/man.png') }}"
                                    class="profile-user-img img-fluid img-circle" alt="User Image">



                            </div>

                            <h3 class="profile-username text-center">{{ auth()->user()->first_name }}
                                {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}</h3>

                            <p class="text-muted text-center">{{ auth()->user()->roles[0]->name }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right">{{ auth()->user()->username }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile Number</b> <a class="float-right">{{ auth()->user()->mobile_number }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b> <a class="float-right">{{ auth()->user()->address }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Card Brand</b> <a class="float-right">{{ auth()->user()->car_brand }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Car Body Type</b> <a class="float-right">{{ auth()->user()->bodyType->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Car Color</b> <a class="float-right">{{ auth()->user()->car_color }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Plate Number</b> <a class="float-right">{{ auth()->user()->car_license_plate }}</a>
                                </li>
                            </ul>


                        </div>
                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                {{-- <li class="nav-item"><a class="nav-link active" href="#edit"
                                        data-toggle="tab">Edit</a></li> --}}

                                <li class="nav-item"><a class="nav-link active" href="#password"
                                        data-toggle="tab">Password</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                {{-- <div class="active tab-pane" id="edit">
                                    <form wire:submit.prevent="updateuser" class="form-horizontal">

                                        <div class="form-group row">
                                            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="data.firstName" name="data[firstName]"
                                                    type="text" class="form-control" id="firstName">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middleName" class="col-sm-2 col-form-label">Middle Name</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="data.middleName" name="data[middleName]"
                                                    type="text" class="form-control" id="middleName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="data.lastName" name="data[lastName]"
                                                    type="text" class="form-control" id="lastName">
                                            </div>
                                        </div>




                                    </form>
                                </div> --}}

                                <div class="active tab-pane" id="password">
                                    <form wire:submit.prevent="updatePassword" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="currentPassword" class="col-sm-2 col-form-label">Old
                                                Password</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="password.currentPassword"
                                                    name="password[currentPassword]" type="password"
                                                    class="form-control" id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="newPassword" class="col-sm-2 col-form-label">New
                                                Password</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="password.newPassword"
                                                    name="password[newPassword]" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="renewPassword" class="col-sm-2 col-form-label">Confirm
                                                Password</label>
                                            <div class="col-sm-4">
                                                <input wire:model.defer="password.renewPassword"
                                                    name="password[renewPassword]" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
