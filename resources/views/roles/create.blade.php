@extends('layouts.master')
@inject('perm','Spatie\Permission\Models\Permission')
@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Role</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @include('partials.validation_errors')
            <form action="{{route('roles.store')}}" method="POST">
                @csrf()
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter role" name="name">
                </div>

                <div class="form-group">
                    <label for="name">Permission:</label>
                    <input type="text" class="form-control" placeholder="Enter Permission" name="permission[]">
                </div>


                <li><input id="selectAll" type="checkbox"><label for='selectAll'>Select All</label></li>
                <div class="row">
                    @foreach($perm->all() as $permission)
                        <div class="col-3">
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" id="check1" name="permission[]" value="{{$permission->id}}" >
                                <label class="form-check-label">{{$permission->name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@push('scripts')
    <script>

        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });


    </script>
@endpush
