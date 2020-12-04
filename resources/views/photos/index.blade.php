@extends('layout')

@section('title', 'Index')



@section('content')
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th >Name:</th>
            <th style="padding: 20px;">Photo:</th>
            <th>Action:</th>
        </tr>
        @foreach($profiles as $profile)
            <tr>
                <td>
                    {{$profile->name}}
                </td>
                <td><img src="public/images/{{ $profile->photo }}"  class="img-thumbnail" width="75" /></td>
                <td>
                    <form action="{{ route('photos.destroy',$profile->id) }}" method="post">

                        <a class="btn btn-info" href="{{ route('photos.show',$profile->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('photos.edit',$profile->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</div>
    @endsection
