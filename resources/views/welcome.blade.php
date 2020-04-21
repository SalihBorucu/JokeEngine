<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Joke Engine</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="header-image">
                <div class="row">
                    <div class="header">
                        <h1>Joke Engine</h1>
                    </div>
                </div>
            </div>

            {{-- <div class="row"> --}}
            <div class="jumbotron">
                <p>How many jokes would you like to see?</p>

                <form action="/getjoke" method="POST">
                    @csrf
                    <select class="form-control form-control-lg mb-3" name="jokeAmount">
                        @for ($i = 0; $i <= 20; $i++)
                            <option>{{ $i }}</option> 
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-success">Get Jokes</button>
                </form>
                <div class="row">
                    @isset($jokeArray)
                        @foreach ($jokeArray as $joke)
                            <div class="col-sm-3">
                                <br>
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Joke {{ $loop->index + 1 }}</h5>
                                        <p class="card-text">{{ $joke }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
