// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable( {
      "language": {
          "search": "Tìm kiếm:",
          "lengthMenu" : "Hiển thị _MENU_ kết quả",
          "info" : "Hiển thị trang _PAGE_ trong tổng số _PAGES_ trang",
          "pageLength": 50
      }
      }

  );
});
