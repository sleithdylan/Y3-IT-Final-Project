// $(document).ready(function() {
//   $('button').click(function() {
//     $('p').removeClass('collapse');
//   });
// });

$(function() {
  $('button').click(function() {
    $(this)
      .parent()
      .parent()
      .toggleClass('collapsed');
    // $('.btn').html('Read Less');
    $(this)
      .parent()
      .parent()
      .find('.collapse')
      .slideToggle();
  });
});

// $('button').click(function() {
//   if ($(this).hasClass('collapse')) {
//     $(this)
//       .removeClass('collapsed')
//       // .addClass('circle_minus')
//       .find('button')
//       .text('Read Less');
//   } else {
//     // vice versa
//   }
// });
