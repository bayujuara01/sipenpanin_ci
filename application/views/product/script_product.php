<script type="text/javascript">
  $(document).ready(function() {
    $('#dataProduct').DataTable();
    getProduct();

    $('#btn_show_add').on('click', function(e) {
      $('#addModal').modal('show');
      let categoryAddElement = document.getElementById('category_product');
      getCategory(categoryAddElement);
    });

    // Get Modal Edit/Update
    $('#data_product').on('click', '#item_edit_product', function(e) {
      let id = e.currentTarget.attributes.data.value;
      let categoryEditElement = document.getElementById('category_product_edit');
      // console.log(id);
      // $('#editProductModalLabel').text('Pembaharuan Data Pelanggan');

      $.ajax({
        type: 'GET',
        url: '<?php echo site_url('product/get_product'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          id_product: id
        },
        success: function(data) {
          let nameProduct = $('[name="name_edit_product"]');
          let codeProduct = $('[name="code_edit_product"]');
          let buyProduct = $('[name="buy_edit_product"]');
          let sellProduct = $('[name="sell_edit_product"]');
          let idProduct = $('[name="id_product_edit"]');

          if (data) {

            $('#editModal').modal('show');
            console.log(data)

            nameProduct.val(data.nama_produk);
            codeProduct.val(data.kode_produk);
            buyProduct.val(data.hrg_beli);
            sellProduct.val(data.hrg_jual);
            idProduct.val(data.id_produk);

            getCategory(categoryEditElement, data.id_kategori);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      });
    });

    // Get Modal Delete
    $('#data_product').on('click', '#item_delete_product', function(e) {
      let id = $(this).attr('data');
      // console.log(e.currentTarget.attributes.data.value);
      $('#deleteModal').modal('show');
      $('[name="id_produk"]').val(id);
    });

    // Process Edit/Update product
    $('#btn_edit_product').on('click', function(e) {
      let nameProduct = $('[name="name_edit_product"]');
      let codeProduct = $('[name="code_edit_product"]');
      let buyProduct = $('[name="buy_edit_product"]');
      let sellProduct = $('[name="sell_edit_product"]');
      let idProduct = $('[name="id_product_edit"]');
      let categoryProduct = $('[name="category_product_edit"]');

      console.log(categoryProduct);

      let dataProduct = {
        id_produk: idProduct.val(),
        nama_produk: nameProduct.val(),
        kode_produk: codeProduct.val(),
        hrg_beli: buyProduct.val(),
        hrg_jual: sellProduct.val(),
        id_kategori: categoryProduct.val()
      }

      console.log(dataProduct.nama_produk != '');

      if (
        dataProduct.nama_produk != '' &&
        dataProduct.kode_produk != '' &&
        dataProduct.hrg_beli != 0 &&
        dataProduct.hrg_jual != 0 &&
        dataProduct.hrg_beli != '' &&
        dataProduct.hrg_jual != ''
      ) {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('product/edit_product'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataProduct,
          error: function(jqXHR) {
            console.log(jqXHR.status);
            console.log(jqXHR.responseText);
          },
          success: function(data, textStatus, jqXHR) {
            console.log(jqXHR.status);
            if (data > 0) {
              getProduct();
            } else {
              alert('Terdapat kesalahan');
            }
            nameProduct.val('');
            codeProduct.val('');
            buyProduct.val('');
            sellProduct.val('');
          }
        }).done(function(data) {
          console.log(data);
        });
      } else {
        $('#editModal').modal('hide');
        alert('Mohon isi data dengan lengkap');
        $('#editModal').modal('show');
      }

    });

    $('#btn_delete_product').on('click', function(e) {
      var id = $('#id_product').val();
      $.ajax({
        type: 'POST',
        url: '<?= site_url('product/delete_product') ?>',
        dataType: 'JSON',
        data: {
          id_product: id
        },
        success: function(data) {
          // console.log(data);
          getProduct();
        }
      });
    });

    // Process Add product
    $('#btn_add_product').on('click', function(e) {
      let nameProduct = $('[name="name_product"]');
      let codeProduct = $('[name="code_product"]');
      let buyProduct = $('[name="buy_product"]');
      let sellProduct = $('[name="sell_product"]');
      let idProduct = $('[name="id_product"]');
      let categoryProduct = $('[name="category_product"]');

      console.log(categoryProduct);

      let dataProduct = {
        id_produk: idProduct.val(),
        nama_produk: nameProduct.val(),
        kode_produk: codeProduct.val(),
        hrg_beli: buyProduct.val(),
        hrg_jual: sellProduct.val(),
        id_kategori: categoryProduct.val()
      }

      if (
        dataProduct.nama_produk != '' &&
        dataProduct.kode_produk != '' &&
        dataProduct.hrg_beli != 0 &&
        dataProduct.hrg_jual != 0 &&
        dataProduct.hrg_beli != '' &&
        dataProduct.hrg_jual != ''
      ) {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('product/add_product'); ?>',
          async: true,
          dataType: 'JSON',
          data: dataProduct,
          error: function(jqXHR) {
            console.log(jqXHR.status);
            console.log(jqXHR.responseText);
          },
          success: function(data, textStatus, jqXHR) {
            console.log(jqXHR.status);
            if (data > 0) {
              getProduct();
            } else {
              alert('Terdapat kesalahan');
            }
            nameProduct.val('');
            codeProduct.val('');
            buyProduct.val('');
            sellProduct.val('');
          }
        }).done(function(data) {
          console.log(data);
        });
      } else {
        // $('#addModal').modal('hide');
        alert('Mohon isi data dengan lengkap');
        $('#addModal').modal('show');
        $('#addModal').modal('show');
      }
    });
  });

  // Function Product get data
  function getProduct() {
    $.ajax({
      type: 'GET',
      url: '<?php echo site_url('product/get_product'); ?>',
      async: true,
      dataType: 'json',
      success: function(data) {
        let html = '';
        // console.log(data);
        for (let i = 0; i < data.length; i++) {
          html += `
            <tr>
              <td>${data[i].kode_produk}</td>
              <td>${data[i].nama_produk}</td>
              <td>${data[i].stok_produk}</td>
              <td>${data[i].hrg_jual}</td>
              <td class="text-table-hide">${data[i].id_produk}</td>
              <td class="text-center">
              <a data-toggle="modal" id="item_edit_product" data="${data[i].id_produk}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
              <a data-toggle="modal" id="item_delete_product" data="${data[i].id_produk}" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            <tr>
            `
        }
        document.getElementById('data_product').innerHTML = html;
      }
    });
  }

  // Function get category
  function getCategory(element, idCategory = null) {
    // let dataCategory;
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url('category/get_category'); ?>',
      async: true,
      dataType: 'json',
      success: function(data) {
        // dataCategory = data;
        let categories = '';
        console.log(data);
        for (let i = 0; i < data.length; i++) {
          if (idCategory != null && idCategory == data[i].id_kategori) {
            categories += `<option value="${data[i].id_kategori}" selected>${data[i].nama_kategori}</option>`;
          } else {
            categories += `<option value="${data[i].id_kategori}">${data[i].nama_kategori}</option>`;
          }
        }
        element.innerHTML = categories;
      }
    });
  }
</script>