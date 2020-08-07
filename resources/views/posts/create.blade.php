@extends ('layouts.app')

@section('content')


{!! Form::model($post, ['route' => 'posts.store']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('region_id', 'Region:') !!}
        {!! Form::select('region_id', $regions->pluck('region', 'id')->all()) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'category:') !!}
        {!! Form::select('category_id', $categories->pluck('category', 'id')->all()) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}




@endsection