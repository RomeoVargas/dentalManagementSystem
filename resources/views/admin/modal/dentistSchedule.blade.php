<div class="modal fade" id="dentistScheduleModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="addBranch">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $user->name }} - Schedule</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/dentists/schedule/save') }}" class="form-horizontal row">
                    <div class="col-md-offset-1 col-md-10">

                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Monday
                                </th>
                                <td>
                                    <input type="time" name="mondayFrom"> to <input type="time" name="mondayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Tuesday
                                </th>
                                <td>
                                    <input type="time" name="tuesdayFrom"> to <input type="time" name="tuesdayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Wednesday
                                </th>
                                <td>
                                    <input type="time" name="wednesdayFrom"> to <input type="time" name="wednesdayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Thursday
                                </th>
                                <td>
                                    <input type="time" name="thursdayFrom"> to <input type="time" name="thursdayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Friday
                                </th>
                                <td>
                                    <input type="time" name="fridayFrom"> to <input type="time" name="fridayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Saturday
                                </th>
                                <td>
                                    <input type="time" name="saturdayFrom"> to <input type="time" name="saturdayTo">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input checked class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Sunday
                                </th>
                                <td>
                                    <input type="time" name="sundayFrom"> to <input type="time" name="sundayTo">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button class="btn btn-sm btn-primary btn-block" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>