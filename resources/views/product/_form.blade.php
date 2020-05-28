@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <style media="screen">
    .btn-group.special {
        display: flex;
    }

    .special .btn {
        flex: 1
    }
  </style>
@endsection

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-7 br-1 p-20">
          <div class="form-row">
            <input
              type="file"
              name="image"
              class="dropify"
              data-show-remove="false"
              data-max-file-size="10M"
              data-allowed-file-extensions="jpeg png gif jpg"
              data-default-file={{ isset($product) ? $product->getFirstMediaUrl() : null }}
            >
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-12 mb-2">
              <label for="name">Name</label>
              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-sm" value="{{ isset($product) ? $product->name : null }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-12 mb-2">
              <label for="resume">Resume</label>
              @error('resume')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <textarea name="resume" rows="8" cols="80" class="form-control @error('resume') is-invalid @enderror">{{ isset($product) ? $product->resume : null }}</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-12 mb-2">
              <label for="description">Description</label>
              @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <textarea name="description" rows="8" cols="80" class="form-control @error('description') is-invalid @enderror" id="summernote">{{ isset($product) ? $product->description : null }}</textarea>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-4 offset-md-1">
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <label for="reference"><h3 class="font-600">Reference</h3></label>
            @error('reference')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="reference" class="form-control @error('reference') is-invalid @enderror form-control-sm" value="{{ isset($product) ? $product->reference : null }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <label for="quantity"><h3 class="font-600">Quantity</h3></label>
            @error('quantity')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror form-control-sm" value="{{ isset($product) ? $product->quantity : null }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <label for="price"><h3 class="font-600">Price</h3></label>
            @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror form-control-sm" value="{{ isset($product) ? $product->price : null }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <label for="category_id"><h3 class="font-600">Category</h3></label>
            @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select class="form-control @error('category_id') is-invalid @enderror form-control-sm" name="category_id">
              @foreach($categories as $category)
                <option {{ isset($product) && $product->category->id == $category->id ? "selected" : null }} value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <label><h3 class="font-600">Active ?</h3></label>
            <input type="hidden" name="active" id="active_input" value="{{ isset($product) ? $product->active : 1 }}">
            <div class="btn-group btn-group-toggle special" data-toggle="buttons">
              <label id="activated_label" class="btn {{ (isset($product)) ? (($product->active) ? "btn-success" : null) : "btn-success" }}">
                <input type="radio" name="options" onclick="setActive(true)">Yes
              </label>
              <label id="deactivated_label" class="btn {{ isset($product) && !$product->active ? "btn-success" : null }}">
                <input type="radio" name="options" onclick="setActive(false)">No
              </label>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-12 mb-2">
            <button type="submit" class="btn btn-success btn-block" name="button">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.dropify').dropify();
    $('#summernote').summernote({
      height: 300
    });
  });
  </script>
  <script type="text/javascript">
    function setActive(option) {
      let active_input = $('#active_input');
      let activated_label = $('#activated_label');
      let deactivated_label = $('#deactivated_label');
      if (option) {
        activated_label.addClass("btn-success");
        deactivated_label.removeClass("btn-success");
        active_input.val(1);
      }else {
        deactivated_label.addClass("btn-success");
        activated_label.removeClass("btn-success");
        active_input.val(0);
      }
    }
  </script>
@endsection
