@extends('Layout.appAdmin')

@section('title')
    EDITER PRODIUT
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
                 
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">AJOUT PRODUIT</h4>
                  <form class="cmxform" id="commentForm" method="POST" action="{{URL::to('/updateProduit')}}" enctype="multipart/form-data">
                    <fieldset>
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="cname"> PRODUCT NAME </label>
                        <input id="cname" class="form-control" name="product_name" minlength="2" type="text" value="{{$Product->product_name}}" required>
                      </div>
                      <div class="form-group">
                        <label for="cnumber"> PRODUCT PRICE </label>
                        <input id="cnumber" class="form-control" name="product_price" minlength="" type="number" value="{{$Product->product_price}}" required>
                      </div>

                        <div class="form-group">
                          {{Form::label('','categorie du produit')}}
                          {{Form::select('product_category',$categorie,$Product->product_category,
                           ['class'=>'form-control'])}}
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
                      <input  name="id" type="hidden" value="{{$Product->id}}" >
                      <input class="btn btn-primary " type="submit" value="MODIFIER">
                    <a href="{{URL::to('/produitShowAll')}}" class="btn btn-warning">Retour</a>
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