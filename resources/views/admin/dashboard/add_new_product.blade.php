<div class="profile" id="new-Product" style="display: block;"> 
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Products</h1>
        <p>Register New Product Here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
       
        <li class="breadcrumb-item active"><a href="#">Products List</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="tile">

        <!-- code to add new products to website -->
          <h3 class="tile-title">Enter Product Details Below Here</h3>
          <div class="tile-body">
            <form method="POST" id="formProduct">
              <div id="productError">

              </div>
              <div class="row">
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">

                <!-- adding new product form -->
                  <label class="control-label">Product Name</label>
                  <input class="form-control" id="product_name"  name="product_name" type="text">

              </div>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Product Code</label>
                <input type="text" name="product_code" id="product_code" class="form-control input-lg">
                </div>
               </div>
              </div>
              <div class="row">
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Category</label>
                  <select name="product_category" id="product_category" class="form-control input-lg">
								<option value="" disabled selected>.......</option>
                               
								</select>
                </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Brand</label>
                  <select name="product_brand" id="product_brand" class="form-control input-lg">
								<option value="" disabled selected>--------</option>
                                
								</select>
                </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="form-group">
                  <label class="control-label">Sub Category</label>
                  <select name="sub_category" id="sub_category" class="form-control input-lg">
								<option value="" disabled selected>--------</option>
                                
								</select>
                </div>
               </div>
              </div>
            
            <div class="row">
              
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Product Description</label>
                  <textarea class="input-lg form-control w3-card-6" cols="80" id="Product_title" name="product_description" style="min-width:80%;">
               </textarea> 
                </div>
              </div>
              <div class="col-sm-6 col-sm-6 col-lg-6">
                <div class="form-group">
                  <label class="control-label">Purchase Price</label>
                  <input type="number" name="purchase_price" id="purchase-price" class="input-lg form-control w3-card-4">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-4 col-lg-4">
                <div class="form-group">
                <label class="control-label">Selling Price</label>
                  <input type="number" name="selling_price" id="selling-price" class="input-lg form-control w3-card-4">
                </div>
              </div>
              <div class="col-sm-4 col-sm-4 col-lg-4">
                <div class="form-group">
                <label class="control-label">Product Quantity</label>
                  <input type="number" name="product_quantity" id="product_quantity" class="input-lg form-control w3-card-4">
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-4">
                <div class="form-group">
                  <label class="control-label">Product Image</label>
                  <input type="file" name="img" class="form-control input-lg">

                </div>
            </div>
            </div>
        
            <div class="row">
             
              </div>
             
             
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile-footer" >
                  <button class="btn btn-primary" id="buttonProduct" type="submit" style="margin-left:20%;margin-right:50%;">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"
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