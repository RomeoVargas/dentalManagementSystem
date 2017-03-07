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
                                    <input {{ !isset($currentSchedule['monday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Monday
                                </th>
                                <td>
                                    @php
                                        $mondayDisabled = !isset($currentSchedule['monday']) ? 'disabled' : null;
                                        $mondayFrom = !$mondayDisabled ? $currentSchedule['monday']['from'] : null;
                                        $mondayTo = !$mondayDisabled ? $currentSchedule['monday']['to'] : null;
                                    @endphp
                                    <input {{$mondayDisabled}} type="time" name="mondayFrom" value="{{ to_time_format($mondayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$mondayDisabled}} type="time" name="mondayTo" value="{{ to_time_format($mondayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['tuesday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Tuesday
                                </th>
                                <td>
                                    @php
                                        $tuesdayDisabled = !isset($currentSchedule['tuesday']) ? 'disabled' : null;
                                        $tuesdayFrom = !$tuesdayDisabled ? $currentSchedule['tuesday']['from'] : null;
                                        $tuesdayTo = !$tuesdayDisabled ? $currentSchedule['tuesday']['to'] : null;
                                    @endphp
                                    <input {{$tuesdayDisabled}} type="time" name="tuesdayFrom" value="{{ to_time_format($tuesdayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$tuesdayDisabled}} type="time" name="tuesdayTo" value="{{ to_time_format($tuesdayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['wednesday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Wednesday
                                </th>
                                <td>
                                    @php
                                        $wednesdayDisabled = !isset($currentSchedule['wednesday']) ? 'disabled' : null;
                                        $wednesdayFrom = !$wednesdayDisabled ? $currentSchedule['wednesday']['from'] : null;
                                        $wednesdayTo = !$wednesdayDisabled ? $currentSchedule['wednesday']['to'] : null;
                                    @endphp
                                    <input {{$wednesdayDisabled}} type="time" name="wednesdayFrom" value="{{ to_time_format($wednesdayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$wednesdayDisabled}} type="time" name="wednesdayTo" value="{{ to_time_format($wednesdayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['thursday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Thursday
                                </th>
                                <td>
                                    @php
                                        $thursdayDisabled = !isset($currentSchedule['thursday']) ? 'disabled' : null;
                                        $thursdayFrom = !$thursdayDisabled ? $currentSchedule['thursday']['from'] : null;
                                        $thursdayTo = !$thursdayDisabled ? $currentSchedule['thursday']['to'] : null;
                                    @endphp
                                    <input {{$thursdayDisabled}} type="time" name="thursdayFrom" value="{{ to_time_format($thursdayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$thursdayDisabled}} type="time" name="thursdayTo" value="{{ to_time_format($thursdayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['friday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Friday
                                </th>
                                <td>
                                    @php
                                        $fridayDisabled = !isset($currentSchedule['friday']) ? 'disabled' : null;
                                        $fridayFrom = !$fridayDisabled ? $currentSchedule['friday']['from'] : null;
                                        $fridayTo = !$fridayDisabled ? $currentSchedule['friday']['to'] : null;
                                    @endphp
                                    <input {{$fridayDisabled}} type="time" name="fridayFrom" value="{{ to_time_format($fridayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$fridayDisabled}} type="time" name="fridayTo" value="{{ to_time_format($fridayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['saturday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Saturday
                                </th>
                                <td>
                                    @php
                                        $saturdayDisabled = !isset($currentSchedule['saturday']) ? 'disabled' : null;
                                        $saturdayFrom = !$fridayDisabled ? $currentSchedule['saturday']['from'] : null;
                                        $saturdayTo = !$fridayDisabled ? $currentSchedule['saturday']['to'] : null;
                                    @endphp
                                    <input {{$saturdayDisabled}} type="time" name="saturdayFrom" value="{{ to_time_format($saturdayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$saturdayDisabled}} type="time" name="saturdayTo" value="{{ to_time_format($saturdayTo, 'H:i:s') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input {{ !isset($currentSchedule['sunday']) ?: 'checked' }} class="schedToggle" type="checkbox" data-toggle="toggle" data-size="small">
                                    Sunday
                                </th>
                                <td>
                                    @php
                                        $sundayDisabled = !isset($currentSchedule['sunday']) ? 'disabled' : null;
                                        $sundayFrom = !$fridayDisabled ? $currentSchedule['sunday']['from'] : null;
                                        $sundayTo = !$fridayDisabled ? $currentSchedule['sunday']['to'] : null;
                                    @endphp
                                    <input {{$sundayDisabled}} type="time" name="sundayFrom" value="{{ to_time_format($sundayFrom, 'H:i:s') }}">
                                    to
                                    <input {{$sundayDisabled}} type="time" name="sundayTo" value="{{ to_time_format($sundayTo, 'H:i:s') }}">
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