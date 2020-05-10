<script type="text/javascript">
  $(document).ready(function() {

    // get_category();
    // Category DataTable with refresh ajax
    $('#dataCategory').DataTable({
      ajax: {
        url: '<?php echo base_url('category/get_category'); ?>',
        dataSrc: ''
      },
      columns: [{
          data: null,
          render: function(data, type, full, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        }, {
          data: "nama_kategori",
        },
        {
          sortable: false,
          render: function(data, type, full, meta) {
            return `
            <a data-toggle="modal" id="item_edit_category" data="${full.id_kategori}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
            <a data-toggle="modal" id="item_delete_category" data="${full.id_kategori}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
            `
          }
        }
      ]
    });

    // Clear modal input
    $('#btn_cancel').click(function() {
      $('[name="name_category"]').val('');
    });

    // Get Modal Delete
    $('#data_category').on('click', '#item_delete_category', function(e) {
      let id = $(this).attr('data');
      // console.log(e.currentTarget.attributes.data.value);
      $('#deleteModal').modal('show');
      $('[name="id_category"]').val(id);
    });

    // Get Modal Edit/Update
    $('#data_category').on('click', '#item_edit_category', function(e) {
      let id = e.currentTarget.attributes.data.value;
      $('#editModal').modal('show');


      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('category/get_category'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          id_category: id
        },
        success: function(data) {
          let nameCategory = $('[name="name_edit_category"]');
          let idCategory = $('[name="id_category_edit"]');
          if (data) {

            $('[name="id_category_edit"').val(id);
            nameCategory.val(data.nama_kategori);
            idCategory.val(data.id_kategori);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      })
    });

    // Delete Process button
    $('#btn_delete_category').on('click', function(e) {
      var id = $('#id_category').val();
      $.ajax({
        type: 'POST',
        url: '<?= site_url('category/delete_category') ?>',
        dataType: 'JSON',
        data: {
          id_category: id
        },
        success: function(data) {
          // console.log(data);
          //get_category();
          $('#dataCategory').DataTable().ajax.reload();
        }
      });

    });

    // Update Process button
    $('#btn_edit_category').on('click', function(e) {
      let nameCategory = $('[name="name_edit_category"]');
      let idCategory = $('[name="id_category_edit"');

      let dataCategory = {
        id_category: idCategory.val(),
        name_category: nameCategory.val(),
      }

      console.log(dataCategory);

      if (dataCategory.name_category != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('category/edit_category'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataCategory,
          success: function(data) {
            if (data > 0) {
              // get_category();
              $('#dataCategory').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameCategory.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });

    // Add Process button
    $('#btn_add_category').on('click', function(e) {

      let nameCategory = $('[name="name_category"]');

      let dataCategory = {
        name_category: nameCategory.val(),
      }
      console.log(dataCategory);
      if (dataCategory.nama_kategori != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('category/add_category'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataCategory,
          success: function(data) {
            if (data > 0) {
              // get_category();
              $('#dataCategory').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameCategory.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });
  });

  // Function Category get data
  function get_category() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url('category/get_category'); ?>',
      async: true,
      dataType: 'json',
      success: function(data) {
        let html = '';
        console.log(data);
        for (let i = 0; i < data.length; i++) {
          html += `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nama_kategori}</td>
              <td class="text-center">
              <a data-toggle="modal" id="item_edit_category" data="${data[i].id_kategori}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_category" data="${data[i].id_kategori}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
        }
        document.getElementById('data_category').innerHTML = html;
      }
    });
  }
</script>