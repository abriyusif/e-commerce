
 <!-- End Category Modal -->
 <!-- Modal Add New category !-->
<div id="newCategoryu" class="modal fade w3-padding-left" role="dialog">
<div class="modal-dialog modal-lg"  style="width:90%;height:auto;">

<!-- Modal content-->
<div class="modal-content w3-padding-left w3-padding-right">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<h4 class="modal-title w3-bottombar w3-center w3-padding-8 w3-border-bottom" style="font-family:cursive;text-align:center;">Update Sub Category</h4>
<div class="modal-body">

<form id="addCategoryu" class="card-body" method="POST">
<input type="hidden" name="hidden_category_id" id="hidden_category_id">
<div>
<div id="addcategoryErroru" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
<ul class="w3-ul" style="list-style:none;">

</ul>
</div>
</div>
<div class="row">
<div class="col-sm-12 col-lg-12 col-md-12">
<div class="form-group">
<label for="material">Name</label>
<input class="form-control"name="category_nameu" id="category_nameu" type="text" aria-describedby="categoryHelp" placeholder="">

</div>
</div>

<div class="col-sm-12 col-lg-12 col-md-12">
<div class="form-group">
<label for="material">Description</label>
<textarea class="form-control" name="category_descriptionu" id="category_descriptionu" cols="30" rows="10"></textarea>
</div>
</div>
</div>


<div class="tile-footer">
<div class="row w3-padding-8">
<div class="col-md-3 col-sm-3 col-lg-3">
</div>
<div class="col-md-4 col-sm-4 col-lg-4">
<button class="btn btn-primary btn-lg btn-block" id="buttonCategoryu" type="submit">
<i class="fa fa-fw fa-lg fa-check-circle"></i
>UPDATE</button
>

</div>
</div>
<div class="row w3-padding-8">
<div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel-pass pull-right" href="#"
><i class="fa fa-fw fa-lg fa-times-circle"></i>Clear</a>

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
 <!-- End Edit Category Modal -->
<!-- Modal Add New category !-->
<div id="newCategory" class="modal fade w3-padding-left" role="dialog">
<div class="modal-dialog modal-lg"  style="width:90%;height:80%;">

<!-- Modal content-->
<div class="modal-content w3-padding-left w3-padding-right">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<h4 class="modal-title w3-bottombar w3-center w3-padding-8 w3-border-bottom" style="font-family:cursive;text-align:center;">Add New Category</h4>
<div class="modal-body">

<form id="addCategory" class="card-body" method="POST">
<div>
<div id="addcategoryError" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
<ul class="w3-ul" style="list-style:none;">

</ul>
</div>
</div>
<div class="row">
<div class="col-sm-12 col-lg-12 col-md-12">
<div class="form-group">
<label for="material">Name</label>
<input class="form-control"name="category_name" id="category_name" type="text" aria-describedby="categoryHelp" placeholder="">

</div>
</div>

<div class="col-sm-12 col-lg-12 col-md-12">
<div class="form-group">
<label for="material">Description</label>
<textarea class="form-control" name="category_description" id="category_description" cols="30" rows="10"></textarea>

</div>
</div>
</div>


<div class="tile-footer">
<div class="row w3-padding-8">
<div class="col-md-3 col-sm-3 col-lg-3">
</div>
<div class="col-md-4 col-sm-4 col-lg-4">
<button class="btn btn-primary btn-lg btn-block" id="buttonCategory" type="submit">
<i class="fa fa-fw fa-lg fa-check-circle"></i
>ADD</button
>

</div>
</div>
<div class="row w3-padding-8">
<div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel-pass pull-right" href="#"
><i class="fa fa-fw fa-lg fa-times-circle"></i>Clear</a>

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
<div class="profile" id="categories-list"> 
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Categories</h1>
        <p>List of Categories</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
       
        <li class="breadcrumb-item active"><span class="input-group-btn">
  <button data-toggle="modal" data-target="#newCategory" class=" btn btn-primary" ><i class="fa fa-user-plus"></i>New Category</button>
  </span></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="tile">
          <h3 class="tile-title">Category List</h3>
          <div class="tile-body">
          <table style="width:100%;" id="categories-table" class="table table-bordered yajra-datatable">
          <thead>
          <tr>
          <th>#</th>
          <th>Name</th>
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
