<form class="m-2" method="post" action="{{ route('photos.update',$profile->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ $profile->name }}" class="form-control" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="image"> Image: </label>
        <input id="photo" value="{{ $profile->photo }}" type="file" name="photo">
    </div>
    <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Save</button>
</form>