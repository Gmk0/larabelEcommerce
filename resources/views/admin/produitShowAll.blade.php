@extends('Layout.appAdmin')
@section('title')
    
@endsection

@section('contenu')

 <!-- partial -->
      {{Form::hidden('',$increment =1)}}



          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Image</th>
                            <th>Nom Du Produit</th>
                            <th>Categorie Produit</th>
                            <th>Prix</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($Product as $product)
                         <tr>
                            <td>{{$increment}}</td>
                            <td><img src="/storage/product_images/{{$product->product_image}}" alt=""></td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_category}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>
                              @if($product->status==1)
                                  <label class="badge badge-info">Activer</label>
                                 @else
                                  <label class="badge badge-desactiver">Desactiver </label>   
                              @endif
                            
                            </td>
                            <td>
                              <a href="{{URL::to('/edit_produit/'.$product->id)}}" class="btn btn-outline-primary">Edit</a>
                              <a href="{{URL::to('/delete_produit/'.$product->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                          {{Form::hidden('',$increment =$increment+1)}}
                        @endforeach 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

    @endsection
    @section('script')
    <script src="backend/js/data-table.js"></script>
     @endsection