@extends('Layout.appAdmin')

@section('title')
    
@endsection

@section('contenu')




       <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">AJOUT PRODUIT</h4>
                  <form class="cmxform" id="commentForm" method="POST" action="{{URL::to('/saveProduit')}}" enctype="multipart/form-data">
                    <fieldset>
                      
                      <div class="form-group">
                        <label for="cname"> PRODUCT NAME </label>
                        <input id="cname" class="form-control" name="name" minlength="2" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="cnumber"> PRODUCT PRICE </label>
                        <input id="cnumber" class="form-control" name="name" minlength="2" type="number" required>
                      </div>

                        <div class="form-group">
                          <label for="ccategorie" class="form-label">SELECT</label>
                          <select class="form-control" name="categorie" id="ccategorie">
                            <option></option>
                          </select>
                        </div>
                           <div class="form-group">
                        <label for="image"> IMAGE </label>
                        <input id="image" class="form-control" name="name" minlength="2" type="file" required>
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