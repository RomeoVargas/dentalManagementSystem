<div class="modal fade" id="addStaffModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="addStaff">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $id ? 'Edit' : 'Add' }} Staff</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST"
                      action="{{ url('admin/staffs/save') }}" class="form-horizontal row">
                    <div class="col-md-offset-1 col-md-10">
                        @if($id)
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') ?: $email }}">
                                    {!! $errors->first('email', "<p class='help-block'>:message</p>") !!}
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-primary">Change Password</a>
                                </div>
                            </div>
                        @else
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') ?: $email }}">
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
                        @endif

                        <hr/>
                        <div class="col-sm-4">
                            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                            <img src="{{ $avatar ?: asset('img/no-avatar.jpg') }}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="avatar" class="form-control">
                                            </span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                {!! $errors->first('avatar', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-sm-7 text-left">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') ?: $name }}">
                                    {!! $errors->first('name', "<p class='help-block'>:message</p>") !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-label">Branch</label>
                                <div class="col-sm-12">
                                    @php
                                        $currentBranchId = old('branch') ?: $branch;
                                        $branches = \App\Models\Branch::all();
                                    @endphp
                                    <select name="branch" class="form-control">
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}" {{ $branch->id != $currentBranchId ?: 'selected' }}>{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! $errors->first('branch', '<p class="help-block col-sm-offset-2 col-sm-10">:message</p>') !!}
                            </div>
                        </div>

                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $id }}">
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
                $('#addStaffModal{{$id}}').modal('show');
            });
        </script>
    @endif
@endsection