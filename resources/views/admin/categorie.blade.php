@extends('Layout.appAdmin')
@section('title')
    
@endsection

@section('contenu')

    @if (Session::has('status'))
                      <div class="alert alert-success" role="alert" >
                             <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <p> {{Session::get('status')}}</p>
                           {{---Session::put('message',null)---}}
                       </div>
                    
                      
                  @endif

             <input type="hidden" value="{{$increment=1}}">           
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
                            <th>Nom Categorie</th>
                            
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categorie as $categorie)
                          <tr>
                            <td>{{$increment}}</td>
                            <td>{{$categorie->category_name}}</td>                            
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                                <a href="{{URL::to('/edit_category/'.$categorie->id)}}"class="btn btn-outline-primary">Edit</a>
                              <a href="{{URL::to('/delete_category/'.$categorie->id)}}" class="btn btn-outline-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                           <input type="hidden" value="{{$increment=$increment+1}}"> 
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



     <!-- Button trigger modal -->
    
     