console.log('hello');

$(".btn-to-cart").click(function(event){
  event.preventDefault();
  let dish = $(this).data("dish");
  console.log(dish);

  $.ajax({
    type: "GET",
    url: '/addDishAjax/' + dish,
    dataType: 'json',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data){
      // console.log(data);

      $("#incart").html(data.items.length);

    },

    error: function(data){

    }
  })


});
