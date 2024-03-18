@extends('templates.pages')
@section('title')
@section('header')
<h1>Customer</h1>
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
          <form id="filter" action="{{ route('customer.index') }}" method="GET">
            <div class="input-group">
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
                <th style="white-space: nowrap">Customer Name</th>
                <th style="white-space: nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
                <tr>
                  <td style="white-space: nowrap">{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                  <td style="white-space: nowrap">{{ $customer->Customer_Name }}</td>
                  <td style="white-space: nowrap">
                    <a href="{{ route('cdr.index', ['customerId' => $customer->Customer_id]) }}" class="btn btn-icon btn-primary">CDR</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="float-right">
          {{ $customers->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('search').addEventListener('input', function() {
          document.getElementById('filter').submit();
      });
  });
</script>
<script>
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get('search');

  document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById('search');

      if (searchQuery) {
          searchInput.value = searchQuery;
      }
  });
</script>
@endpush