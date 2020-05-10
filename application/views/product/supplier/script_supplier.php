<script type="text/javascript">
  $(document).ready(function() {

    $('#dataSupplier').DataTable({
      ajax: {
        url: '<?php echo base_url('supplier/get_supplier'); ?>',
        dataSrc: ''
      },
      columns: [{
          data: null,
          render: function(data, type, full, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        }, {
          data: 'nama_supplier',
        },
        {
          data: 'telp_supplier',
        },
        {
          data: 'alamat_supplier'
        },
        {
          sortable: false,
          render: function(data, type, full, meta) {
            return `
            <a data-toggle="modal" id="item_edit_supplier" data="${full.id_supplier}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
            <a data-toggle="modal" id="item_delete_supplier" data="${full.id_supplier}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
            `
          }
        }
      ]
    });

    // Get Modal Delete
    $('#data_supplier').on('click', '#item_delete_supplier', function(e) {
      let id = $(this).attr('data');
      // console.log(e.currentTarget.attributes.data.value);
      $('#deleteModal').modal('show');
      $('[name="id_supplier"]').val(id);
    });

    // Get Modal Edit/Update
    $('#data_supplier').on('click', '#item_edit_supplier', function(e) {
      let id = e.currentTarget.attributes.data.value;
      $('#editModal').modal('show');

      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('supplier/get_supplier'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          id_supplier: id
        },
        success: function(data) {
          let nameSupplier = $('[name="name_edit_supplier"]');
          let telpSupplier = $('[name="telp_edit_supplier"]')
          let addressSupplier = $('[name="address_edit_supplier"]')
          let idSupplier = $('[name="id_supplier_edit"]');
          if (data) {

            idSupplier.val(id);
            nameSupplier.val(data.nama_supplier);
            telpSupplier.val(data.telp_supplier);
            addressSupplier.val(data.alamat_supplier);
            idSupplier.val(data.id_supplier);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      })
    });

    // Delete Process button
    $('#btn_delete_supplier').on('click', function(e) {
      var id = $('#id_supplier').val();
      $.ajax({
        type: 'POST',
        url: '<?= site_url('supplier/delete_supplier') ?>',
        dataType: 'JSON',
        data: {
          id_supplier: id
        },
        success: function(data) {
          // console.log(data);
          $('#dataSupplier').DataTable().ajax.reload();
        }
      });

    });

    // Update Process button
    $('#btn_edit_supplier').on('click', function(e) {
      let nameSupplier = $('[name="name_edit_supplier"]');
      let telpSupplier = $('[name="telp_edit_supplier"]');
      let addressSupplier = $('[name="address_edit_supplier"]');
      let idSupplier = $('[name="id_supplier_edit"');

      let dataSupplier = {
        id_supplier: idSupplier.val(),
        name_supplier: nameSupplier.val(),
        telp_supplier: telpSupplier.val(),
        address_supplier: addressSupplier.val()
      }

      console.log(dataSupplier);

      if (dataSupplier.name_supplier != '' ||
        dataSupplier.telp_supplier != '' ||
        dataSupplier.address_supplier != ''
      ) {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('supplier/edit_supplier'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataSupplier,
          success: function(data) {
            if (data > 0) {
              $('#dataSupplier').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameSupplier.val('');
            telpSupplier.val('');
            addressSupplier.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });

    // Add Process button
    $('#btn_add_supplier').on('click', function(e) {

      let nameSupplier = $('[name="name_supplier"]');
      let telpSupplier = $('[name="telp_supplier"]');
      let addressSupplier = $('[name="address_supplier"]');

      let dataSupplier = {
        name_supplier: nameSupplier.val(),
        telp_supplier: telpSupplier.val(),
        address_supplier: addressSupplier.val()
      }
      console.log(dataSupplier);
      if (dataSupplier.nama_supplier != '' ||
        dataSupplier.telp_supplier != '' ||
        dataSupplier.address_supplier != ''
      ) {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('supplier/add_supplier'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataSupplier,
          success: function(data) {
            if (data > 0) {
              $('#dataSupplier').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameSupplier.val('');
            telpSupplier.val('');
            addressSupplier.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });



    // Function Supplier get data
    function get_supplier() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('supplier/get_supplier'); ?>',
        async: true,
        dataType: 'json',
        success: function(data) {
          let html = '';
          console.log(data);
          for (let i = 0; i < data.length; i++) {
            html += `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nama_supplier}</td>
              <td class="text-table-hide">${data[i].id_supplier}</td>
              <td>${data[i].singkat_supplier}
              <td class="text-center">
              <a data-toggle="modal" id="item_edit_supplier" data="${data[i].id_supplier}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_supplier" data="${data[i].id_supplier}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
          }
          document.getElementById('data_supplier').innerHTML = html;
        }
      });
    }

  });
</script>