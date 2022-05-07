@extends('Layout.appAdmin')

@section('title')
    AJOUT SLIDER
@endsection

@section('contenu')


 
       <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MODIFIER SLIDER</h4>
                  <form class="cmxform" id="commentForm" method="POST" action="{{URL::to('/updateSlider')}}" enctype="multipart/form-data">
                    <fieldset>
                      {{csrf_field() }}
                      <div class="form-group">
                        <label for="cname">Description one</label>
                        <input id="cname" class="form-control" name="description_one"  type="text" value="{{$slider->description_one}}" required>
                      </div>
                       
                      <div class="form-group">
                        <label for="cname">Description two</label>
                        <input id="cname" class="form-control" name="description_two" type="text" value="{{$slider->description_two}}" required>
                      </div>
                       
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input id="image" class="form-control" name="slider_image" minlength="" type="file" value="">
                      </div>
                      {{-- 
                      <div class="form-group">
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" class="form-control" type="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="curl">URL (optional)</label>
                        <input id="curl" class="form-control" type="url" name="url">
                      </div>
                      <div class="form-group">
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                      </div> --}}
                      <input class="btn btn-primary" name="id" type="hidden" value="{{$slider->id}}">
                      <input class="btn btn-primary" type="submit" value="Submit">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>


    
@endsection

@section('script')
     <script src="backend/js/form-validation.js"></script>
  <script src="backend/js/bt-maxLength.js"></script>
@endsection