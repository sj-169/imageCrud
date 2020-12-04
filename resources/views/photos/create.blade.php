<form class="m-2" method="post" action="{{ route('photos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image"> Name: </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
        <label for="image"> Image: </label>
        <input id="photo" type="file" name="photo">
    </div>
    <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Save</button>
</form>