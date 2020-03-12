// Show image (id=>imgshow) when input file (id=>photo) changed
$("#photo").change(function () {
  if (this.files && this.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $('#imgshow').attr('src', e.target.result);
  }
  reader.readAsDataURL(this.files[0]);
  }
});

// Custiom table show
$('#datatable').DataTable({
  responsive: true,
  language: {
  searchPlaceholder: 'Tìm kiếm...',
  sSearch: '',
  lengthMenu: '_MENU_ dòng/trang',
  }
});

// Confirm delete
$('.btn-delete').click(function (e) {
  if (!confirm("Do you want to delete?"))
    e.preventDefault();
});