@extends('layouts.app')

@section('content')

<!-- input con estilo de tailwind-->
<div class="max-w-md md:max-w-2xl  mx-auto">
  <input class="mt-3 rounded-xl" type="text"  id='product_search'>
</div>


<!-- Script -->
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#product_search" ).autocomplete({
        source: function( request, response ) {
        $.ajax( {
            url:"{{route('Products.getProducts')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
          success: function( data ) {
            response( data );
          }
        } );
      },
        
      });

    });

    
      
    

  </script>
    
@endsection

