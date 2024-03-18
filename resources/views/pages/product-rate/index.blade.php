@extends('templates.pages')
@section('title')
@section('header')
<h1>Product Rate</h1>
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
          <form id="filter" action="{{ route('product-rate.index') }}" method="GET">
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
                <th style="white-space: nowrap">Provider</th>
                <th style="white-space: nowrap">Location</th>
                <th style="white-space: nowrap">Service</th>
                <th style="white-space: nowrap">Call Type</th>
                <th style="white-space: nowrap">Prefix</th>
                <th style="white-space: nowrap">Cost</th>
                <th style="white-space: nowrap">Block1</th>
                <th style="white-space: nowrap">Block2</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productRates as $productRate)
                <tr>
                  <td style="white-space: nowrap">{{ ($productRates->currentPage() - 1) * $productRates->perPage() + $loop->iteration }}</td>
                  <td style="white-space: nowrap">{{ $productRate->provider_id }}</td>
                  <td style="white-space: nowrap">{{ $productRate->location_id }}</td>
                  <td style="white-space: nowrap">{{ $productRate->service_id }}</td>
                  <td style="white-space: nowrap">{{ $productRate->prefix }}</td>
                  <td style="white-space: nowrap">{{ $productRate->call_type_id }}</td>
                  <td style="white-space: nowrap">{{ number_format($productRate->cost, 2) }}</td>
                  <td style="white-space: nowrap">{{ $productRate->block1 }}</td>
                  <td style="white-space: nowrap">{{ $productRate->block2 }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="float-right">
          {{ $productRates->links('pagination::bootstrap-4') }}
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