{!!Form::open(['method' => 'get', 'route' => 'catalog.filter'])!!}

{!! Form::text('minPrice', '0', ['placeholder'=> 'Minimum Price']) !!}

{!! Form::text('maxPrice', '10000', ['placeholder'=>'maximum Price']) !!}

{!! Form::submit('Filter') !!} 

{!! Form::close() !!}