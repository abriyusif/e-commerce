<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/w3school.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
    
    <style type="text/css">
    .profile  
    {
        display:none;
    }
    </style>

</head> 
<body class="app sidebar-mini rtl">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <main class="app-content">
    @yield('content')
    @include('admin.dashboard.add_new_product')
    @include('admin.dashboard.product_list')
    @include('admin.dashboard.brand_lists')
    @include('admin.dashboard.category_list')
    @include('admin.dashboard.sub_category_list')
    @include('admin.dashboard.users_list')
    @include('admin.dashboard.orders_list')
    @include('admin.dashboard.messages_list')
    </main>
   <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
      <!-- Select2 Js -->
  <script src="{{ asset('js/select2.min.js') }}"></script>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/vfs_fonts.js" integrity="sha256-UsYCHdwExTu9cZB+QgcOkNzUCTweXr5cNfRlAAtIlPY=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

    <script>
    //Count Users 
function countUsers()
{
  $.ajax({
    method:"GET",
    url:"countUsers",
    success:function(data)
    {
      $('#no_users').html(data);
    }
  })
}
//End
    //Count Users 
    function countProducts()
{
  $.ajax({
    method:"GET",
    url:"countProducts",
    success:function(data)
    {
      $('#no_products').html(data);
    }
  })
}
//End
  //Count Orders
  function countOrders()
{
  $.ajax({
    method:"GET",
    url:"countOrders",
    success:function(data)
    {
      $('#no_orders').html(data);
    }
  })
}
//End
    $(document).ready(function(){
      countUsers();
      countProducts();
      countOrders();
        $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

// get Brands
$('#product_brand').select2({
                  //alert("JQUERY IS OKAY");
                ajax:{
                  url:"getBrands",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
                //edit
                $('#product_brandu').select2({
                  //alert("JQUERY IS OKAY");
                ajax:{
                  url:"getBrands",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
                //get Categories
                $('#product_category').select2({
                ajax:{
                  url:"getCategories",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
                //edit
                $('#product_categoryu').select2({
                ajax:{
                  url:"getCategories",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
                //get Sub Categories
                $('#sub_category').select2({
                ajax:{
                  url:"getSubs",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
                //edit
                $('#sub_categoryu').select2({
                ajax:{
                  url:"getSubs",
                  type: "POST",
                  dataType:'json',
                  delay:250,
                  data:function(params)
                  {
                    return {
                      
                      search:params.term // search term
                    }
                  },
                  processResults:function (response)
                  {
                    return {
                      results:response
                    }
                  },
                  cache:true
                }
                });
//Product List

    var productsTable = $('#products-table').DataTable({
    processing:true,
       serverSide:true,
       responsive:true,
        ajax:
        {
         url: 'products',
         
        },
        "columns":[
                    {data:'DT_RowIndex',name: 'DT_RowIndex'},
					{data:'product_code',name:'product_code'},
					{data:'product_name',name:'product_name'},
					{data:'product_category',name:'product_category'},
					{data:'product_brand',name:'product_brand'},
					{data:'purchase_price',name:'purchase_price'},
					{data:'selling_price',name:'selling_price'},
					{data:'product_quantity',name:'product_quantity'},
					{data:'product_description',name:'product_description'},
					{data:'action',name:'action',orderable:false,searchable:false},
				
        ],
        dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    
  
});
//End Product List
 //Brands data table
 var table1 = $('#brands-table').DataTable({
        processing:true,
        serverSide:true,
        responsive:true,
        ajax:
        {
        url: 'brands',

        },
        "columns":[
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'brand_name', name: 'brand_name'},
        {data: 'description', name: 'description'},
        {
        data: 'action', 
        name: 'action', 
        orderable: true, 
        searchable: true
        },
        ],
        dom: 'lBfrtip',
        buttons: [
        {extend:'excel',footer:true, exportOptions: {
        columns: ':visible',
        }

        },
        {extend:'csv',footer:true,},
        {extend:'pdf',footer:true},
        {extend:'copy',footer:true},
        'colvis'
        ],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    
  
});
 //Sub Categories data table
 var table3 = $('#sub-categories-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('subcategories.index') }}",
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'sub_category_name', name: 'sub_category_name'},
						{data: 'description', name: 'description'},
						{
							data: 'action', 
							name: 'action', 
							orderable: true, 
							searchable: true
						},
					],
                    dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                   
				});
     
 
  

      //End
       //Sub Categories data table
 var table4 = $('#categories-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('categories.index') }}",
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'category_name', name: 'category_name'},
						{data: 'description', name: 'description'},
						{
							data: 'action', 
							name: 'action', 
							orderable: true, 
							searchable: true
						},
					],
                    dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                   
				});
     
 
  

      //End
       //Users data table
 var table5 = $('#users-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('users.index') }}",
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'name', name: 'name'},
						{data: 'username', name: 'username'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'email', name: 'email'}
					],
                    dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                   
				});
     
 
  

      //End
        //Orders data table
 var table6 = $('#orders-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('orders.index') }}",
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'product_name', name: 'product_name'},
            {data: 'quantity', name: 'quantity'},
						{data: 'total_amount', name: 'total_amount'},
            {data: 'payment_status', name: 'payment_status'},
            {data: 'txn_id', name: 'txn_id'},
            {data: 'details', name: 'details'}
					],
                    dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                   
				});
     
 
  

      //End
        //Messages data table
 var table6 = $('#messages-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('messages.index') }}",
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'name', name: 'name'},
						{data: 'email', name: 'email'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'}
					],
                    dom: 'lBfrtip',
        buttons: [
    {extend:'excel',footer:true, exportOptions: {
                    columns: ':visible',
                   }
                   
                   },
    {extend:'csv',footer:true,},
    {extend:'pdf',footer:true},
    {extend:'copy',footer:true},
    'colvis'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                   
				});
     
 
  

      //End
//Sidebar Js Code
$('.treeview-menu li a').click(function(e){
        e.preventDefault();
        $('.treeview-menu li a').removeClass("active");
        //add the acive state to the clicked link
        $(this).addClass("active");
        //fade out the current container
        $('.profile').fadeOut(600,function(){
        $('#' + profileID).fadeIn(600);
        });
        var profileID=$(this).attr("data-id");
     });
//End
/**
New Product Registration
 */
 


$("#formProduct").on('submit',(function(e)
{
e.preventDefault();
//alert("You Are Good To Go");
$.ajax({
url:"{{ route('products.store')}}",
type:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
beforeSend:function()
{

$("#buttonProduct").html('Inserting Product...');
},
success : function(response)
{
if($.isEmptyObject(response.error))
{
swal({
title:"Success",
text:"New  Product Successfully Registered",
icon:"success",
button:"OK"
});
$("#buttonProduct").html('ADD');
$('#products-table').DataTable().ajax.reload();
//		$('.data-table').DataTable().ajax.reload();
}

else

{
            
$("#productError").fadeIn(1000, function(){						
printErrorMsg(response.error,"productError");
$("#buttonProduct").html('ADD PRODUCT');
});
}	
}
});
}));

//Edit & Update Product
 //Edit Bill
 $(document).on('click','.editProduct',function(){
	var id = $(this).attr('id');
  // alert(id);
 
	$.get("{{route('products.index')}}" +'/' + id +'/edit',function(data)
	{
    //var dat =  JSON.parse(data);
    //alert(data.item);
		$('#hidden_product_id').val(id);
    
    //$('#hidden_details').val(item_id);
   $('#product_nameu').val(data.product_name);
	 $('#product_codeu').val(data.product_code);
	 $('#product_categoryu').val(data.product_category);
	 $('#product_categoryu').val(data.product_category);
	 $('#product_brandu').val(data.product_brand);
	 $('#product_descriptionu').val(data.product_description);
	 $('#purchase_priceu').val(data.purchase_price);
   $('#selling_priceu').val(data.selling_price);
   $('#product_quantityu').val(data.product_quantity);
   $('#editProduct').modal('show');
   
	});
});
//End
//Update Product
$("#formProductu").on('submit',(function(e)
{

e.preventDefault();
//alert("You Are Good To Go");

$.ajax({
url:"{{route('products.update')}}",
type:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
beforeSend:function()
{
$("#productErroru").fadeOut();
$("#buttonProductu").html('Updating Details....');
},
success : function(response)
{
if($.isEmptyObject(response.error))
{
swal({
title:"Success",
text:response.success,
icon:"success",
button:"OK"
});
$('#formProductu').trigger('reset');
 $('#editProduct').modal('toggle');
$('#products-table').DataTable().ajax.reload();
}

else

{
            
$("#productErroru").fadeIn(1000, function(){						
printErrorMsg(response.error,"productErroru");
$("#buttonProductu").html('Update Details');
});
}	
}
});
}));
//End
//Remove Product
$(document).on('click','.deleteProduct',function(){
  var id=$(this).attr('id');
  swal({
    title:"Are you sure you to remove this product ?",
    text:"This Action Cannot be Reverted",
    icon:"warning",
    buttons:true,
    dangerMode:true,
  })
  .then((willDelete) => {
    if(willDelete) 
    {
    $.ajax({
                  url:"products/"+id,
                  type:'DELETE',
                  data:{id:id},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Product Successfuly Removed",
												icon:"success",
												button:"OK"
											});
                     
											$('#products-table').DataTable().ajax.reload();
									
									}
                });
              }
               else {
    swal("Product Not Removed!");
  }


  });
});
//End
  //Add Brands
       // alert("You Are Good To Go");
       $('#formBrands').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('brands.store')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#buttonBrands').html('Adding New Brand');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.brand_insert_errors))
							 {
								 $('#brandErrors').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success_insert_brands,
									 icon:"success",
									 button:"OK"
								 });
								 $("#buttonBrands").html("ADD BRAND");
								 $("#formBrands").trigger("reset");
                 $('#brands-table').DataTable().ajax.reload();
							 }
							 else
							 {
								 $("#brandErrors").fadeIn(1000,function(){
									 printErrorMsg(response.brand_insert_errors,"brandErrors");
									 $("#buttonBrands").html("ADD BRAND")
								 })
							 }
						 }
					 })
				 });
/**
*End Brand Registration
 */
 //Edit & Update Product
 //Edit Bill
 $(document).on('click','.editBrand',function(){
	var id = $(this).attr('id');
  // alert(id);
 
	$.get("{{route('brands.index')}}" +'/' + id +'/edit',function(data)
	{
    //var dat =  JSON.parse(data);
    //alert(data.item);
		$('#hidden_brand_id').val(id);
    
    //$('#hidden_details').val(item_id);
   $('#brand_nameu').val(data.brand_name);
	 $('#brand_descriptionu').val(data.description);
	
   $('#newBrandu').modal('show');
   
	});
});
//End

//Edit Brand
       // alert("You Are Good To Go");
       $('#formBrandsu').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('brands.update')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#buttonBrandsu').html('Updating Brand');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.brand_update_errors))
							 {
								 $('#brandErrorsu').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success_update_brands,
									 icon:"success",
									 button:"OK"
								 });
								 $("#buttonBrandsu").html("UPDATE");
								 $("#formBrandsu").trigger("reset");
                 $('#brands-table').DataTable().ajax.reload();
                 $('#newBrandu').modal('toggle');
							 }
							 else
							 {
								 $("#brandErrors").fadeIn(1000,function(){
									 printErrorMsg(response.brand_update_errors,"brandErrorsu");
									 $("#buttonBrandsu").html("UPDATE");
							 })
						 }
					 }
				 });
       })
/**
*End Edit Brand **/
//Remove Brand

$(document).on('click','.deleteBrand',function(){
  var id=$(this).attr('id');
  swal({
    title:"Are you sure you to remove this brand ?",
    text:"This Action Cannot be Reverted",
    icon:"warning",
    buttons:true,
    dangerMode:true,
  })
  .then((willDelete) => {
    if(willDelete) 
    {
    $.ajax({
                  url:"brands/"+id,
                  type:'DELETE',
                  data:{id:id},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Brand Successfuly Removed",
												icon:"success",
												button:"OK"
											});
                     
											$('#brands-table').DataTable().ajax.reload();
									
									}
                });
              }
               else {
    swal("Brand Not Removed!");
  }


  });
});

//End Remove Brand
 //Add New Category
$('#addCategory').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('categories.store')}}",
        type:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
            $('#buttonCategory').html('Adding New Category');
        },
        success : function(response)
        {
            if($.isEmptyObject(response.category_insert_errors))
            {
                $('#addcategoryError').fadeOut('slow');
                swal({
                    title:"Success",
                    text:response.success,
                    icon:"success",
                    button:"OK"
                });
                $("#buttonCategory").html("ADD BRAND");
                $("#addCategory").trigger("reset");
                $('#categories-table').DataTable().ajax.reload();
            }
            else
            {
                $("#brandErrors").fadeIn(1000,function(){
                    
                    printErrorMsg(response.category_insert_errors,"addcategoryError");
                    $("#buttonCategory").html("ADD BRAND")
                })
            }
        }
    })
});
      
 //End
 //Edit & Update Product
 //Edit Bill
 $(document).on('click','.editCategory',function(){
	var id = $(this).attr('id');
  // alert(id);
 
	$.get("{{route('categories.index')}}" +'/' + id +'/edit',function(data)
	{
    //var dat =  JSON.parse(data);
    //alert(data.item);
		$('#hidden_category_id').val(id);
    
    //$('#hidden_details').val(item_id);
   $('#category_nameu').val(data.category_name);
	 $('#category_descriptionu').val(data.description);
	
   $('#newCategoryu').modal('show');
   
	});
});
//End
//Update Category
$('#addCategoryu').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('categories.update')}}",
        type:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
            $('#buttonCategoryu').html('Updating Category');
        },
        success : function(response)
        {
            if($.isEmptyObject(response.category_update_errors))
            {
                $('#addcategoryError').fadeOut('slow');
                swal({
                    title:"Success",
                    text:response.success_category_update,
                    icon:"success",
                    button:"OK"
                });
                $("#buttonCategoryu").html("UPDATE CATEGORY");
                $("#addCategoryu").trigger("reset");
                $('#categories-table').DataTable().ajax.reload();
                $('#newCategoryu').modal('toggle');
            }
            else
            {
                $("#brandErrors").fadeIn(1000,function(){
                    
                    printErrorMsg(response.category_update_errors,"addcategoryErroru");
                    $("#buttonCategoryu").html("UPDATE CATEGORY")
                })
            }
        }
    })
});
//End
//Remove Category
$(document).on('click','.deleteCategory',function(){
  var id=$(this).attr('id');
  swal({
    title:"Are you sure you to remove this category ?",
    text:"This Action Cannot be Reverted",
    icon:"warning",
    buttons:true,
    dangerMode:true,
  })
  .then((willDelete) => {
    if(willDelete) 
    {
    $.ajax({
                  url:"categories/"+id,
                  type:'DELETE',
                  data:{id:id},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Category Successfuly Removed",
												icon:"success",
												button:"OK"
											});
                     
											$('#categories-table').DataTable().ajax.reload();
									
									}
                });
              }
               else {
    swal("Category Not Removed!");
  }


  });
});
//End
 //Add Sub Categories
       // alert("You Are Good To Go");
       $('#addSubCategory').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('subcategories.store')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#buttonSubCategory').html('Adding New Category');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.sub_category_insert_errors))
							 {
								 $('#subcategoryError').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success,
									 icon:"success",
									 button:"OK"
								 });
								 $("#buttonSubCategory").html("ADD SUB CATEGORY");
								 $("#addSubCategory").trigger("reset");
                 $("#sub-categories-table").DataTable().ajax.reload();
							 }
							 else
							 {
								 $("#subcategoryError").fadeIn(1000,function(){
									 printErrorMsg(sub_category_insert_errors,"subcategoryError");
									 $("#buttonSubCategory").html("ADD SUB CATEGORY")
								 })
							 }
						 }
					 })
				 });
      //  End
      //Edit & Update Product
 //Edit Bill
 $(document).on('click','.editSubCategory',function(){
	var id = $(this).attr('id');
  // alert(id);
 
	$.get("{{route('subcategories.index')}}" +'/' + id +'/edit',function(data)
	{
    //var dat =  JSON.parse(data);
    //alert(data.item);
		$('#hidden_sub_category_id').val(id);
    
    //$('#hidden_details').val(item_id);
   $('#sub_category_nameu').val(data.sub_category_name);
	 $('#sub_category_descriptionu').val(data.description);
	
   $('#newSubCategoryu').modal('show');
   
	});
});
//End
//Update Category
       $('#addSubCategoryu').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('subcategories.update')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#buttonSubCategoryu').html('Updating Sub Category');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.sub_category_update_errors))
							 {
								 $('#subcategoryErroru').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success_sub_category_update,
									 icon:"success",
									 button:"OK"
								 });
								 $("#buttonSubCategoryu").html("UPDATE");
								 $("#addSubCategory").trigger("reset");
                 $("#sub-categories-table").DataTable().ajax.reload();
                 $('#newSubCategoryu').modal('toggle');
							 }
							 else
							 {
								 $("#subcategoryErroru").fadeIn(1000,function(){
									 printErrorMsg(sub_category_update_errors,"subcategoryError");
									 $("#buttonSubCategoryu").html("UPDATE")
								 })
							 }
						 }
					 })
				 });
      //  End
//End
//Remove Category
$(document).on('click','.deleteSubCategory',function(){
  var id=$(this).attr('id');
  swal({
    title:"Are you sure you to remove this category ?",
    text:"This Action Cannot be Reverted",
    icon:"warning",
    buttons:true,
    dangerMode:true,
  })
  .then((willDelete) => {
    if(willDelete) 
    {
    $.ajax({
                  url:"subcategories/"+id,
                  type:'DELETE',
                  data:{id:id},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Sub Category Successfuly Removed",
												icon:"success",
												button:"OK"
											});
                     
											$('#sub-categories-table').DataTable().ajax.reload();
									
									}
                });
              }
               else {
    swal("Sub Category Not Removed!");
  }


  });
});
//End

      //End
 
    });
    //Error Messages
 function printErrorMsg(msg,div)
			 {
				 $.each(msg,function(key,value){
                    $("#"+div).fadeIn();
					$("#"+div).find('ul').append('<li>' + value + '</li>');

				 });
			 }
// function printErrorMsg(msg)
// {
// $(".print-error-msg").find("ul").html('');
// $(".print-error-msg").css('display','block');
// $.each(msg,function(key,value){
// $(".print-error-msg").find('ul').append('<li>' + value + '</li>');
// });
// }
    </script>

    
</body>
</html>