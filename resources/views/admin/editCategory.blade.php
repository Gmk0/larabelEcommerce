@extends('Layout.appAdmin')

@section('title')
    
@endsection

@section('contenu')

       <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">AJOUT CATEGORIE</h4>
                  @if (Session::has('status'))
                      <div class="alert alert-success" role="alert" >
                             <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <p> {{Session::get('status')}}</p>
                           {{---Session::put('message',null)---}}
                       </div>
                    
                      
                  @endif
                   @if (count($errors)>0)
                       <div class="alert alert-danger" role="alert" >
                             <button type="button" class="close btn-primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <ul>
                                @foreach ($errors->all() as $error)
                                   <li>{{$error}}</li> 
                                @endforeach
                              </ul>
                           {{---Session::put('message',null)---}}
                       </div>
                       
                      
                  @endif
                  <form class="cmxform" id="commentForm" method="POST" action="{{URL::to('/updateCategory')}}">
                    <fieldset>
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="cname">Name </label>
                        <input id="cname" class="form-control" name="category_name" minlength="2" type="text" value="{{$categorie->category_name}}" required>
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
                      <input class="btn btn-primary" type="submit" value="Submit">
                        <input name="id" type="hidden" value="{{$categorie->id}}">
                      <a href="{{URL::to('/showAllCategorie')}}" class="btn btn-warning">Retour</a>
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