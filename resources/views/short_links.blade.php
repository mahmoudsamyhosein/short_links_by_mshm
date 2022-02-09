<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icon.png') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{__('home_page.shortened_links')}}</title>
    <style>
        h1 { text-align: center}
        .card { direction: rtl}
    </style>
</head>
<body>
    <div class="container">
        <hr>
        <h1 class="text-center">{{__('home_page.shortened_links')}} </h1>
        <hr>
        <div class="card">
            <div class="card-header">
                <form action="{{ route('generate-shortenlink') }}" method="POST">
                    @csrf
                        <div class="input-group mb-3">
                            <input name="link" type="text" class="form-control" placeholder="{{__('home_page.write_a_link')}}">
                            <div class="input-group-append">
                            <button class="btn btn-success">{{__('home_page.generate_shortened_link')}}</button>
                            </div>
                        </div>
                        @if ($errors->has('link'))
                        <span class="alert-danger text-right">
                            <strong class="text-right">{{$errors->first('link')}}</strong>
                        </span>
                        @endif
                </form>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success text-right">
                        <p>{{session('success')}}</p>
                    </div>
                @endif
                <table class="table">
                    <thead class="text-right">
                      <tr>
                        <th>{{__('home_page.original_link')}}</th>
                        <th>{{__('home_page.shortened_link')}}</th>
                        <th>{{__('home_page.number_of_visits')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortlinks as $row)
                        <tr class="text-right">
                            <td>{{ $row->link}}</td>
                            <td><a href="{{ route('show-shorten-link' ,$row->code ) }}"> {{ url('') . '/' . $row->code }} </a></td>
                            <td>{{ $row->visits_count }}</td>
                        </tr>    
                        @endforeach
                      
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center">

                    {{ $shortlinks->links() }}

                  </div>
            </div>
        </div>
    </div>
</body>
</html>