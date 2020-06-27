@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Story</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach( $stories as $story )
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-left">
                                        <img height="38" src="{{$story->user->image ?: 'http://placehold.it/400x400' }}" >
                                    </div>
                                    <div class="media-body">
                                        {{ $story->user->name }}
                                        <small>{{ $story->updated_at->format('F d, Y \a\t g:i A') }}</small>
                                        <p>{{$story->body}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $story->tags->count() }}</td>
                            <td>{{ $story->comments->count() }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('stories', $story->id) }}">View</a>
                                        @if(auth()->id() == $story->user_id)
                                            <a class="dropdown-item" href="{{ url('stories/'.$story->id.'/edit') }}">Edit</a>
                                            <a class="dropdown-item" href="{{ url('stories', $story->id) }}">Delete</a>
                                        @endif

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
