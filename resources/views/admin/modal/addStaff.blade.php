<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaff">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Staff</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/staffs/add') }}" class="form-horizontal row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                {!! $errors->first('email', "<p class='help-block'>:message</p>") !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') || $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                            </div>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            </div>
                            {!! $errors->first('password', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                            {!! $errors->first('password_confirmation', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                        </div>

                        <hr/>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}">
                                {!! $errors->first('name', "<p class='help-block'>:message</p>") !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Branch</label>
                            <div class="col-sm-10">
                                @php($branches = \App\Models\Branch::all())
                                <select name="branch" class="form-control">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {!! $errors->first('branch', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Avatar</label>
                            <div class="col-sm-10">
                            </div>
                            {!! $errors->first('image', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                        </div>

                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-sm btn-primary btn-block" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('specificCustomJs')
    @if(count($errors) > 0)
        <script>
            $(window).load(function(){
                $('#addStaffModal').modal('show');
            });
        </script>
    @endif
@endsection