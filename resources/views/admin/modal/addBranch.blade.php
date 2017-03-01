<div class="modal fade" id="addBranchModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="addBranch">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Branch</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/branches/save') }}" class="form-horizontal row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Branch Name" value="{{ old('name') ?: $name }}">
                                {!! $errors->first('name', "<p class='help-block'>:message</p>") !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" placeholder="Complete Address" value="{{ old('address') ?: $address }}">
                                {!! $errors->first('address', "<p class='help-block'>:message</p>") !!}
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