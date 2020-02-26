$(function() {
  $('.read-more').click(function() {
    $(this)
      .parent()
      .parent()
      .toggleClass('collapsed');
    $(this).text(function(i, text) {
      return text == 'Read Less' ? 'Read More' : 'Read Less';
    });
    $(this)
      .parent()
      .parent()
      .find('.collapse')
      .slideToggle();
  });
});
