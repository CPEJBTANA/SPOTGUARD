<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guests</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Guests</h3>
                        </div>

                        <div class="d-flex justify-content-end mr-2 mt-2">
                            <button wire:click="showModal" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                Add Guest
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Car Brand</th>
                                        <th>Body Type</th>
                                        <th>Car Color</th>
                                        <th>Plate Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($guests as $key => $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->car_brand }}</td>
                                            <td>{{ $value->bodyType->name }}</td>
                                            <td>{{ $value->car_color }}</td>
                                            <td>{{ $value->car_license_plate }}</td>
                                            <td>
                                                {{-- <a class="btn btn-info btn-sm"
                                                    wire:click.prevent="editGuest({{ $value }})">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a> --}}
                                                <a class="btn btn-danger btn-sm"
                                                    wire:click.preven="deleteGuest({{ $value->id }})">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No Guest</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <div wire:ignore class="modal fade" id="form" style="overflow:hidden" role="dialog"
            aria-labelledby="xampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" wire:submit.prevent="submitRequest">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <span>New Guest</span>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label>Name</label>
                                <input type="text" wire:model.defer="data.name" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Address</label>
                                <input type="text" wire:model.defer="data.address" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Car Brand</label>
                                <input type="text" wire:model.defer="data.car_brand" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Car Body Type</label>
                                <select wire:model.lazy="data.body_type_id"class="form-control">
                                    <option value="" disabled selected>Select Body Type</option>
                                    @foreach ($body_types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Car Color</label>
                                <input type="text" wire:model.defer="data.car_color" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>License Plate Number</label>
                                <input type="text" wire:model.defer="data.car_license_plate" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times mr-1"></i>Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>



</div>
