//  Form validation
// disables form submissions if there are invalid fields
(function () {
  'use strict';
  window.addEventListener(
    'load',
    function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
          'submit',
          function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    },
    false
  );
})();

// Toggle class collapsed and change text
$(function () {
  $('.read-more').click(function () {
    $(this).parent().parent().toggleClass('collapsed');
    $(this).text(function (i, text) {
      return text == 'Read Less' ? 'Read More' : 'Read Less';
    });
    $(this).parent().parent().find('.collapse').slideToggle();
  });
});
