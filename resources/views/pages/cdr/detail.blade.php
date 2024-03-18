@extends('templates.pages')
@section('title')
@section('header')
<div class="section-header-back">
  <a href="{{ route('cdr.index', ['customerId' => $customerId]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>MSISDN {{ $ani }}</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success'))
      <div class="alert alert-important alert-primary" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif
  
    <div class="card">
      <div class="card-body">
        <div class="float-left">
          
        </div>
        <div class="float-right">
          <form id="filter" action="{{ route('cdr.detail', ['customerId' => $customerId, 'ani' => $ani]) }}" method="GET">
            <div class="input-group">
              <select id="date" class="form-control" name="date" onchange="compareDate()">
                <option value="">Select Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <input id="search" type="text" class="form-control" name="search" placeholder="Search">
            </div>
          </form>
        </div>

        <div class="clearfix mb-3"></div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="white-space: nowrap">No.</th>
                <th style="white-space: nowrap">Date</th>
                <th style="white-space: nowrap">Time</th>
                <th style="white-space: nowrap">Destination No</th>
                <th style="white-space: nowrap">Duration</th>
                <th style="white-space: nowrap">Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cdrs as $cdr)
                <tr>
                  <td style="white-space: nowrap">{{ $loop->iteration }}</td>
                  <td style="white-space: nowrap">{{ date('d-m-Y', strtotime($cdr->Start_Time)) }}</td>
                  <td style="white-space: nowrap">{{ date('H:i:s', strtotime($cdr->Start_Time)) }}</td>
                  <td style="white-space: nowrap">{{ $cdr->DNIS }}</td>
                  <td style="white-space: nowrap">
                    {{ gmdate('H:i:s', $cdr->Duration) }}
                  </td>
                  <td style="white-space: nowrap">{{ number_format($cdr->Product_Cost, 2) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="float-right">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('date').addEventListener('change', function() {
          document.getElementById('filter').submit();
      });

      document.getElementById('search').addEventListener('input', function() {
          document.getElementById('filter').submit();
      });
  });
</script>
<script>
  const urlParams = new URLSearchParams(window.location.search);
  const selectedDate = urlParams.get('date');
  const searchQuery = urlParams.get('search');

  document.addEventListener("DOMContentLoaded", function() {
      const selectElement = document.getElementById('date');
      const searchInput = document.getElementById('search');

      if (selectedDate) {
          selectElement.value = selectedDate;
      }

      if (searchQuery) {
          searchInput.value = searchQuery;
      }
  });
</script>
@endpush