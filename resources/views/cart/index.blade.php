@extends('welcome')
@section('navbar')
@section('content')
<div class="row">
	<div class="col-sm-12 tittle" style="position: absolute;">
	<h1>Cart</h1>
	</div>
	<img style="width: 100%;" src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
		<div class="table-responsive cart">
      @csrf
          <table class="table">
            <thead class=" text-primary">
              <th>
                
              </th>
              <th>
                Name Product
              </th>
              <th>
                Price Product
              </th>
              <th>
                Quantity
              </th>
              <th>
                Total
              </th>
              <th>
                
              </th>
            </thead>
            
            <tbody>
              
              <div>
                  
              </div>
              <tr>
                <td style="width: 20%; height: 200px;">
                  <img src="">
                </td>
                <td>
                  <p></p>
                </td>
                <td>
                	<p></p>
                </td>
                <td>
                  <div style="padding-top: 60px;" class="col-sm-12 detail_product-info-quantity_addcart">
                    <div class="col-sm-9 detail_product-info-quantity_addcart-quantity">
                      <div class="input-group input-number-group">
                        <div class="input-group-button">
                          <span class="input-number-decrement">-</span>
                        </div>
                        <input class="input-number" type="number" value="" min="0" max="1000">
                        <div class="input-group-button">
                          <span class="input-number-increment">+</span>
                        </div>
                      </div>
                    </div>
                  </div>       
                </td>
                <td>
                	
                </td>
                <td>
                    <a href=""><i class="fa fa-remove"></i></a>
                </td>
              </tr>

            </tbody>
            
          </table>
          <div class="container cart-button_order">
            <div class="col-sm-12">
              <a href="">Checkout</a>
            </div>
          </div>
      </div>
	</div>
</div>
@endsection