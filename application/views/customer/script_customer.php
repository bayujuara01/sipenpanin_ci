<script type="text/javascript">
  $(document).ready(function() {

    $('#dataCustomer').dataTable();
    get_customer();

    // Clear modal input
    $('#btn_cancel').click(function() {
      $('[name="name_customer"]').val('');
      $('[name="telp_customer"]').val('');
      $('[name="address_customer"]').val('');
    });

    // Get Modal Delete
    $('#data_customer').on('click', '#item_delete_customer', function(e) {
      let id = $(this).attr('data');
      // console.log(e.currentTarget.attributes.data.value);
      $('#deleteModal').modal('show');
      $('[name="id_customer"]').val(id);
    });

    // Get Modal Edit/Update
    $('#data_customer').on('click', '#item_edit_customer', function(e) {
      let id = e.currentTarget.attributes.data.value;
      console.log(id);
      $('#editModal').modal('show');
      $('#editCustomerModalLabel').text('Pembaharuan Data Pelanggan');

      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('customer/get_customer'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          id_customer: id
        },
        success: function(data) {
          let nameCustomer = $('[name="name_edit_customer"]');
          let telpCustomer = $('[name="telp_edit_customer"]');
          let addressCustomer = $('[name="address_edit_customer"]');
          let idCustomer = $('[name="id_customer_edit"]');
          if (data) {

            console.log(addressCustomer)

            $('[name="id_customer_edit"').val(id);
            nameCustomer.val(data.nama_customer);
            telpCustomer.val(data.telp_customer);
            addressCustomer.val(data.alamat_customer);
            idCustomer.val(data.id_customer);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      })
    });

    // Delete Process button
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
          // console.log(data);
          get_customer();
        }
      });

    });

    // Update Process button
    $('#btn_edit_customer').on('click', function(e) {
      let nameCustomer = $('[name="name_edit_customer"]');
      let telpCustomer = $('[name="telp_edit_customer"]');
      let addressCustomer = $('[name="address_edit_customer"]');
      let idCustomer = $('[name="id_customer_edit"');

      let dataCustomer = {
        id_customer: idCustomer.val(),
        nama_customer: nameCustomer.val(),
        telp_customer: telpCustomer.val(),
        address_customer: addressCustomer.val()
      }

      if (dataCustomer.nama_customer != '' || dataCustomer.telp_customer != '' || dataCustomer.address_customer != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('customer/edit_customer'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataCustomer,
          success: function(data) {
            if (data > 0) {
              get_customer();
            } else {
              alert('Terdapat kesalahan');
            }
            nameCustomer.val('');
            telpCustomer.val('');
            addressCustomer.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });

    // Add Process button
    $('#btn_add_customer').on('click', function(e) {
      console.log('ok')

      let nameCustomer = $('[name="name_customer"]');
      let telpCustomer = $('[name="telp_customer"]');
      let addressCustomer = $('[name="address_customer"]');

      let dataCustomer = {
        nama_customer: nameCustomer.val(),
        telp_customer: telpCustomer.val(),
        address_customer: addressCustomer.val()
      }

      if (dataCustomer.nama_customer != '' || dataCustomer.telp_customer != '' || dataCustomer.address_customer != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('customer/add_customer'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataCustomer,
          success: function(data) {
            if (data > 0) {
              get_customer();
            } else {
              alert('Terdapat kesalahan');
            }
            nameCustomer.val('');
            telpCustomer.val('');
            addressCustomer.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });



    // Function Customer get data
    function get_customer() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('customer/get_customer'); ?>',
        async: true,
        dataType: 'json',
        success: function(data) {
          let html = '';
          console.log(data);
          for (let i = 0; i < data.length; i++) {
            html += `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nama_customer}</td>
              <td>${data[i].alamat_customer}</td>
              <td>${data[i].telp_customer}</td>
              <td class="text-table-hide">${data[i].id_customer}</td>
              <td class="text-center">
              <a data-toggle="modal" id="item_edit_customer" data="${data[i].id_customer}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_customer" data="${data[i].id_customer}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
          }
          document.getElementById('data_customer').innerHTML = html;
        }
      });
    }
  });
</script>