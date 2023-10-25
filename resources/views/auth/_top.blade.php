  <div class="logo d-flex align-items-center justify-content-between my-5">
      <a href="{{ route('home') }}" class="h1" >
          {{ config('app.name') }}
      </a>
      <a href="{{ route('home') }}" class="close-link">
          <i class="bi bi-x-lg"></i>
          
      </a>
  </div>

  <h2>
      {{ __($title) }}
  </h2>
