function readURLheader(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result);
      $('#blah').parent().addClass('add');
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURLfooter(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah2').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURLsticky(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#stickyimg').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$(document).ready(function(){  
  var i=1;  
  $('#add').click(function(){  
   i++;  
   $('ol').append(' <li class="new"><input type="text" name="name[]" id="pageName'+i+'" required="required" placeholder="Page Name"> <a href="#" class="remove"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="file" required="required" name="fileToUpload[]" id="fileToUpload'+i+'"></a></li>');  
 });  
  $(document).on('click', '.remove', function(){  
   $(this).parent().remove();
 });  
});
$(document).ready(function(){  
  $('.js-data-example-ajax').select2({
    placeholder: "Select an Option",
    tags: true,
    insertTag: function (data, tag) {
        // Insert the tag at the end of the results
        data.push(tag);
      }
    });
});