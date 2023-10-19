  {{-- logo --}}
  <div class="logo d-flex align-items-center justify-content-between">
      <a class="h1" href="{{ route('home') }}">

          {{ config('app.name') }}
      </a>
      {{-- close link --}}
      <a href="{{ route('home') }}" class="close-link">
          {{-- fontawsome close icon --}}
          <i class="bi bi-x-lg"></i>

      </a>
  </div>
  {{-- login welcome --}}
  <h2>
      {{ __($title) }}
  </h2>
