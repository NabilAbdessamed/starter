<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
         
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
          </nav>
        <div class="flex-center position-ref full-height">
         @if (Session::has('success'))
         <div class="alert alert-success"> {{Session::get('success')}}
        </div>
            
         @endif
<form action="{{LaravelLocalization::localizeURL('/offres/store')}} " method="post">
    @csrf
    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name">
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="">price</label>
        <input type="text" name="price">
        @error('price')
        {{$message}}
    @enderror
    </div>
    <div class="form-group">
        <label for="">details</label>
        <input type="text" name="details">
        @error('details')
        {{$message}}
    @enderror
    </div>
    <button type="submit">save</button>
</form>
        </div>
    </body>
</html>
