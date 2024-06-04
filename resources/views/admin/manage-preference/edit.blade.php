@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Prescription Template
    </div>

    <div class="card-body">
      <div style="padding-top: 20px" class="container-fluid">

      <form action="{{ route('admin.preferences.update', [$editPreference->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="medication_name">Medication Name*</label>
          <input type="text" id="medication_name" name="medication_name" class="form-control" value="{{$editPreference->medication_name}}" required="">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="price">Price*</label>
          <input type="text" id="price" name="price" class="form-control" value="{{$editPreference->price}}" required="">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="as_low_as_price">As Low As Price*</label>
          <input type="text" id="as_low_as_price" name="as_low_as_price" class="form-control" value="{{$editPreference->as_low_as_price}}" required="">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="popularity">Popularity</label>
          <input type="text" id="popularity" name="popularity" class="form-control" value="{{$editPreference->popularity}}">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="image">Image*</label>
          <input type="file" id="image" name="image" class="form-control">
          <br>
          <img src="{{$editPreference->image}}" style="width:auto;background:#ddd;height:45px;">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="description">Description*</label>
          <textarea name="description" class="form-control" placeholder="Write your description Here....">{{$editPreference->description}}</textarea>
          <p class="helper-block"></p>
        </div>
        
         <div class="form-group ">
          <label for="email">Status*</label>
          <select name="status" class="form-control">
              <option>Select Status</option>
              <option value="1" <?php if($editPreference->status==1) { echo "Selected"; }?>>Active</option>
              <option value="0" <?php if($editPreference->status==0) { echo "Selected"; }?>>Inactive</option>
          </select>
          <p class="helper-block"></p>
        </div>
       
        <div>
          <input class="btn btn-danger" type="submit" value="Update">
        </div>
      </form>
    </div>
</div>
@endsection

@section('scripts')
 <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop