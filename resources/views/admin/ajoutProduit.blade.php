@extends('Layout.appAdmin')

@section('title')
    
@endsection

@section('contenu')




       <div class="row grid-margin">
            <div class="col-lg-12">
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
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">AJOUT PRODUIT</h4>
                  <form class="cmxform " id="" method="POST" action="{{URL::to('/saveProduit')}}" enctype="multipart/form-data">
                    <fieldset>
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="cname"> PRODUCT NAME </label>
                        <input id="cname" class="form-control" name="product_name" minlength="2" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="cnumber"> PRODUCT PRICE </label>
                        <input id="cnumber" class="form-control" name="product_price" minlength="" type="number" required>
                      </div>

                        <div class="form-group">
                          {{Form::label('','categorie du produit')}}
                          {{Form::select('product_category',$categorie,null,
                           ['placeholder'=>'select category','class'=>'form-control'])}}
                        </div>
                           <div class="form-group">
                        <label for="image"> IMAGE </label>
                        <input id="image" class="form-control" name="product_image" minlength="" type="file" >
                      </div>

                      
                      {{-- 
                      <div class="form-group">
                        @foreach ($categorie as $categori)
                              <option value="{{$categori}}">{{$categori}}</option>  
                            @endforeach
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
                      
                      <input class="btn btn-primary " type="submit" value="Submit">
                   
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