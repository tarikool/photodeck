@extends('layouts.master', ['head' => 'story', 'sidebar' => 'your_stories'])


@section('content')
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
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">View</a>
                                @if(auth()->id() == $story->user_id)
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                @endif

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection



@section('style')
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endsection


@section('script')
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection