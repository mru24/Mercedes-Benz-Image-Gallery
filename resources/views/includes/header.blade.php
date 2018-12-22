@if(isset($title))

  <div class="jumbotron bg-dark">
    <div class="container">
      <img src="{{asset('storage/Mercedes-Benz-Logo.png')}}" alt="" width="80">
      <h1 class="ml-2 logo">{{ $title }}</h1>
    </div>
  </div>

@endif
