<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
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

    </main>
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
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
    $(document).ready(function(){
        $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

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
					{data:'edit',name:'edit',orderable:false,searchable:false},
					{data:'delete',name:'delete',orderable:false,searchable:false},
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
//$("#vehicleError").fadeOut();
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
printErrorMsg(response.error);
$("#buttonProduct").html('ADD PRODUCT');
});
}	
}
});
}));
$("#formProductUpdate").on('submit',(function(e)
{

e.preventDefault();
//alert("You Are Good To Go");
var vehicle_id=$('#hidden_id').val();
//alert(vehicle_id)
$.ajax({
url:"{{route('products.update')}}",
type:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
beforeSend:function()
{
//$("#vehicleError").fadeOut();
$("#buttonVehicleu").html('Updating Details....');
},
success : function(response)
{
if($.isEmptyObject(response.error))
{
swal({
title:"Success",
text:"Product Details Successfully Updated",
icon:"success",
button:"OK"
});
// $('#myModal').modal('toggle');
// $('.data-table').DataTable().ajax.reload();
}

else

{
            
$("#productErroru").fadeIn(1000, function(){						
printErrorMsg(response.error);
$("#buttonProductu").html('Update Details');
});
}	
}
});
}));
/**
*End Product Registration
 */
 //Error Messages
function printErrorMsg(msg)
{
$(".print-error-msg").find("ul").html('');
$(".print-error-msg").css('display','block');
$.each(msg,function(key,value){
$(".print-error-msg").find('ul').append('<li>' + value + '</li>');
});
}
    });
    </script>
</body>
</html>