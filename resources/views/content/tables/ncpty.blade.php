@extends('layouts/contentNavbarLayout')

@section('title', 'NCPTY')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h3>Number of Computing Devices and Peripherals by Type and by Year Acquired</h3>
        <table class="table" style="text-align: center;">
          <tr>
            <th rowspan="3">TYPES</th>
            <th colspan="9">TOTAL NUMBER OF FUNCTIONING UNITS BY YEAR ACQUIRED</th>
          </tr>
          <tr>
            <th colspan="2">{{$years}}</th>
            <th colspan="2">{{$years-1}}</th>
            <th colspan="2">{{$years-2}}</th>
            <th colspan="2">More than 3 years</th>
          </tr>
          <tr>
            <th>Owned</th>
            <th>Leased</th>
            <th>Owned</th>
            <th>Leased</th>
            <th>Owned</th>
            <th>Leased</th>
            <th>Owned</th>
            <th>Leased</th>
          </tr>
          @foreach ($hardwares as $hardware)
          <tr>
            <td>{{$hardware->type}}</td>
            <td>{{$hardware->current_owned}}</td>
            <td>{{$hardware->current_leased}}</td>
            <td>{{$hardware->last_year_owned}}</td>
            <td>{{$hardware->last_year_leased}}</td>
            <td>{{$hardware->last_2_year_owned}}</td>
            <td>{{$hardware->last_2_year_leased}}</td>
            <td>{{$hardware->more_years_owned}}</td>
            <td>{{$hardware->more_years_leased}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
