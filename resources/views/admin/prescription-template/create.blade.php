@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Add Prescription
    </div>

    <div class="card-body">
      <div style="padding-top: 20px" class="container-fluid">

      <form action="{{ route('admin.manage-prescription.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="name">Name*</label>
          <input type="text" id="name" name="prescripton_name" class="form-control" value="" required="">
          <p class="helper-block"></p>
        </div>
        <div class="form-group ">
          <label for="email">Prescription Template*</label>
          <textarea id="editor" name="prescription_area" placeholder="Write your Prescription Here...."></textarea>
          <p class="helper-block"></p>
        </div>
        
        <div class="form-group ">
          <label for="email">Prescription Template Status*</label>
          <select name="status" class="form-control">
              <option>Select Status</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
          <p class="helper-block"></p>
        </div>
       
        <div>
          <input class="btn btn-danger" type="submit" value="Save">
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

<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.employees.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($employee) && $employee->photo)
      var file = {!! json_encode($employee->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop