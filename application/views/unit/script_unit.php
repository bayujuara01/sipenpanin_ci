<script type="text/javascript">
  $(document).ready(function() {

    $('#dataUnit').DataTable({
      ajax: {
        url: '<?php echo base_url('unit/get_unit'); ?>',
        dataSrc: ''
      },
      columns: [{
          data: null,
          render: function(data, type, full, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        }, {
          data: "nama_unit",
        },
        {
          data: "singkat_unit",
        },
        {
          sortable: false,
          render: function(data, type, full, meta) {
            return `
            <a data-toggle="modal" id="item_edit_unit" data="${full.id_unit}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
            <a data-toggle="modal" id="item_delete_unit" data="${full.id_unit}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
            `
          }
        }
      ]
    });

    // Get Modal Delete
    $('#data_unit').on('click', '#item_delete_unit', function(e) {
      let id = $(this).attr('data');
      // console.log(e.currentTarget.attributes.data.value);
      $('#deleteModal').modal('show');
      $('[name="id_unit"]').val(id);
    });

    // Get Modal Edit/Update
    $('#data_unit').on('click', '#item_edit_unit', function(e) {
      let id = e.currentTarget.attributes.data.value;
      $('#editModal').modal('show');

      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('unit/get_unit'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          id_unit: id
        },
        success: function(data) {
          let nameUnit = $('[name="name_edit_unit"]');
          let shortUnit = $('[name="short_edit_unit"]')
          let idUnit = $('[name="id_unit_edit"]');
          if (data) {

            $('[name="id_unit_edit"').val(id);
            nameUnit.val(data.nama_unit);
            shortUnit.val(data.singkat_unit);
            idUnit.val(data.id_unit);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      })
    });

    // Delete Process button
    $('#btn_delete_unit').on('click', function(e) {
      var id = $('#id_unit').val();
      $.ajax({
        type: 'POST',
        url: '<?= site_url('unit/delete_unit') ?>',
        dataType: 'JSON',
        data: {
          id_unit: id
        },
        success: function(data) {
          // console.log(data);
          $('#dataUnit').DataTable().ajax.reload();
        }
      });

    });

    // Update Process button
    $('#btn_edit_unit').on('click', function(e) {
      let nameUnit = $('[name="name_edit_unit"]');
      let shortUnit = $('[name="short_edit_unit"]');
      let idUnit = $('[name="id_unit_edit"');

      let dataUnit = {
        id_unit: idUnit.val(),
        name_unit: nameUnit.val(),
        short_unit: shortUnit.val()
      }

      console.log(dataUnit);

      if (dataUnit.name_unit != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('unit/edit_unit'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataUnit,
          success: function(data) {
            if (data > 0) {
              $('#dataUnit').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameUnit.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });

    // Add Process button
    $('#btn_add_unit').on('click', function(e) {

      let nameUnit = $('[name="name_unit"]');
      let shortUnit = $('[name="short_unit"]');

      let dataUnit = {
        name_unit: nameUnit.val(),
        short_unit: shortUnit.val()
      }
      console.log(dataUnit);
      if (dataUnit.nama_unit != '') {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('unit/add_unit'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataUnit,
          success: function(data) {
            if (data > 0) {
              $('#dataUnit').DataTable().ajax.reload();
            } else {
              alert('Terdapat kesalahan');
            }
            nameUnit.val('');
          }
        });
      } else {
        alert('Mohon isi data dengan lengkap');
      }

    });



    // Function Unit get data
    function get_unit() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('unit/get_unit'); ?>',
        async: true,
        dataType: 'json',
        success: function(data) {
          let html = '';
          console.log(data);
          for (let i = 0; i < data.length; i++) {
            html += `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nama_unit}</td>
              <td class="text-table-hide">${data[i].id_unit}</td>
              <td>${data[i].singkat_unit}
              <td class="text-center">
              <a data-toggle="modal" id="item_edit_unit" data="${data[i].id_unit}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_unit" data="${data[i].id_unit}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
          }
          document.getElementById('data_unit').innerHTML = html;
        }
      });
    }

    // Function add data

  });
</script>