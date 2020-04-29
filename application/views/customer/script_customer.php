<script type="text/javascript">
  $(document).ready(function() {

    $('#dataCustomer').dataTable();
    get_customer();

    // Function Customer get data
    function get_customer() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('customer/get_customer'); ?>',
        async: true,
        dataType: 'json',
        success: function(data) {
          let html = '';

          for (let i = 0; i < data.length; i++) {
            html += `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nama_customer}</td>
              <td>${data[i].alamat_customer}</td>
              <td>${data[i].telp_customer}</td>
              <td class="text-table-hide">${data[i].id_customer}</td>
              <td class="text-center">
              <a href="user/edit/${data[i].id_customer}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_customer" data="${data[i].id_customer}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
          }
          document.getElementById('data_customer').innerHTML = html;
        }
      });
    }

    // Get Modal Delete
    $('#data_customer').on('click', '#item_delete_customer', function(e) {
      let id = $(this).attr('data');
      $('#deleteModal').modal('show');
      $('[name="id_customer"]').val(id);
    });

    // Delete Process
    $('#btn_delete_customer').on('click', function(e) {
      var id = $('#id_customer').val();
      $.ajax({
        type: 'POST',
        url: '<?= site_url('customer/delete_customer') ?>',
        dataType: 'JSON',
        data: {
          id_customer: id
        },
        success: function(data) {
          console.log(data);
          get_customer();
        }
      });

    });
  });
</script>