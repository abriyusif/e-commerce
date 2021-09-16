  <!-- Modal Add New Brand !-->
  <div id="editProduct" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog modal-lg"  style="width:110%;height:auto;">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right w3-padding-16" style="width:110%;height:100%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <h4 class="modal-title w3-bottombar w3-center w3-padding-8 w3-border-bottom" style="font-family:cursive;text-align:center;">Update Product</h4>
      <div class="modal-body">
      <form method="POST" id="formProductu">
      <input type="hidden" name="hidden_product_id" id="hidden_product_id">
              <div id="productErroru">
               <ul class="w3-ul" style="list-style:none;"></ul>
              </div>
              <div class="row">
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" id="product_nameu"  name="product_nameu" type="text">

              </div>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Product Code</label>
                <input type="text" name="product_codeu" id="product_codeu" class="form-control input-lg">
                </div>
               </div>
              </div>
              <div class="row">
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Category</label>
                  <select name="product_categoryu" id="product_categoryu" class="form-control input-lg" style="width:110%">
								<option value="" disabled selected>.......</option>
                               
								</select>
                </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Brand</label>
                  <select name="product_brandu" id="product_brandu" class="form-control input-lg" style="width:110%">
								<option value="" disabled selected>--------</option>
                                
								</select>
                </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Sub Category</label>
                  <select name="sub_categoryu" id="sub_categoryu" class="form-control input-lg" style="width:110%">
								<option value="" disabled selected>--------</option>
                                
								</select>
                </div>
               </div>
              </div>
            
            <div class="row">
              
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Product Description</label>
                  <textarea class="input-lg form-control w3-card-4" cols="80" id="product_descriptionu" name="product_descriptionu" style="min-width:80%;">
               </textarea> 
                </div>
              </div>
              <div class="col-sm-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Purchase Price</label>
                  <input type="number" name="purchase_priceu" id="purchase_priceu" class="input-lg form-control w3-card-4">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-6 col-lg-6">
                <div class="form-group">
                <label class="control-label">Selling Price</label>
                  <input type="number" name="selling_priceu" id="selling_priceu" class="input-lg form-control w3-card-4">
                </div>
              </div>
              <div class="col-sm-6 col-sm-6 col-lg-6">
                <div class="form-group">
                <label class="control-label">Product Quantity</label>
                  <input type="number" name="product_quantityu" id="product_quantityu" class="input-lg form-control w3-card-4">
                </div>
              </div>
            </div>
        
            <div class="row">
             
              </div>
             
             
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile-footer" >
                  <button class="btn btn-primary" id="buttonProductu" type="submit" style="margin-left:20%;margin-right:50%;">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>UPDATE PRODUCT</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary pull-right" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>RESET</a
                  >
                </div>
              </div>
            </div>
             
            </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
<div class="profile" id="products-list"> 
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Products</h1>
        <p>List of Products</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
       
        <li class="breadcrumb-item active"><a href="#">New Product</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="tile">
          <h3 class="tile-title">Product List</h3>
          <div class="tile-body">
          <table id="products-table" class="table table-bordered yajra-datatable">
          <thead>
          <tr>
          <th>#</th>
          <th>Code</th>
          <th>Name</th>
          <th>Category</th>
          <th>Brand</th>
          <th>Purchase Price</th>
          <th>Selling Price</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Action</th>
       
          </tr>
          </thead>
          <tbody>
          </tbody>
          </table>
          </div>
         
        </div>
      </div>
      </div>
</div> 