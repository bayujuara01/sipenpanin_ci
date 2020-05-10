<script type="text/javascript">
  $(document).ready(function() {

    // # Cart Init
    CART.init('<?= $this->authentication->userLogin()->id_pengguna ?>');
    console.log(CART);

    // -> Cart Data Table
    cartTable.init(CART.get());

    // <- End Cart Data Table
  });

  // -> Add Product Data Table
  const productData = $('#dataAddProduct').DataTable({
    scrollY: 250,
    scrollCollapse: true,
    paging: false,
    info: false,
    ordering: false,
    ajax: {
      url: '<?php echo base_url('product/get_product'); ?>',
      dataSrc: ''
    },
    columns: [{
        data: "kode_produk"
      },
      {
        data: "nama_produk"
      },
      {
        data: null,
        render: function(data, type, full, meta) {
          return "Unit";
        }
      },
      {
        data: "hrg_jual"
      },
      {
        data: "stok_produk"
      },
      {
        data: null,
        render: function(data, type, full, meta) {
          return `
          <a id="btn_add_product" data_code="${full.kode_produk}" data_id="${full.id_produk}" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus text-white"></i></a>`;
        }
      }
    ]
  });

  // # Insert ID Product
  $('#dataAddProduct').on('click', "#btn_add_product", function(e) {
    let productId = e.currentTarget.attributes.data_id.value;
    let productCode = e.currentTarget.attributes.data_code.value;
    // console.log(productId);
    $('#id_product').val(productId);
    $('#code_product').val(productCode);

    $('#addItemModal').modal('hide');
  });

  // # Adjust Datatable modal bug
  $('#addItemModal').on('shown.bs.modal', function(e) {
    console.log(e);
    productData.columns.adjust();
  });
  // <- End Add Product Data Table

  /*
   * Usually document.onReady
   * 1. -> btn_add : Tambah produk ke keranjang
   * 2. -> btn_cancel_buy : Batal membeli (kosongkan keranjang)
   * 3. -> btn_submit_buy : Membeli (checkout)
   * 4. -> cart_delete_product : hapus produk di keranjang
   */
  // -> Script btn id="btn_add"
  $('#btn_add').on('click', function(e) {
    let codeProduct = $('#code_product').val();
    let qtyProduct = $('#qty_product').val();

    if (codeProduct != '' && qtyProduct != 0 && qtyProduct != '') {
      $.ajax({
        type: 'GET',
        url: '<?php echo site_url('product/get_product'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          code_product: codeProduct
        },
        success: function(data) {
          if (data) {
            // console.log(data);
            CART.add(data, qtyProduct);

            cartTable.reload(CART.get());
            $('#qty_product').val(1);
          } else {
            alert('Data tidak ditemukan');
          }
        }
      });
    } else {
      alert("Barkode / Qty Kosong");
    }

  });
  // <- End Script btn id="btn_add"

  // -> Script btn_submit_buy
  $('#btn_submit_buy').on('click', function(e) {
    alert('buying...');
    CART.checkout();
  });
  // <- End Script btn_submit_buy

  // -> Script btn_cancel_buy
  $('#btn_cancel_buy').on('click', function(e) {
    CART.removeAll();
    cartTable.reload(CART.get());
  });
  // <- End Script btn_cancel_buy

  // -> Script cart_delete_product and cart_add_product
  $('#dataCart').on('click', "#cart_delete_product", function(e) {
    let id = e.currentTarget.attributes.data_id.value;
    console.log(id);
    CART.delete(id);
    cartTable.reload(CART.get());
  });

  $('#dataCart').on('click', "#cart_add_product", function(e) {
    let id = e.currentTarget.attributes.data_id.value;
    console.log(id);
    CART.increase(id)
    cartTable.reload(CART.get());
  });
  // <- End Script cart_delete_product and cart_add_product

  // -> Cart Area 
  const CART = {
    KEY: 'CART_KEY',
    product: {
      id_produk: null,
      kode_produk: null,
      hrg_jual: null,
      hrg_beli: null,
      qty: 1,
      total_hrg: null
    },
    contents: [],
    init: function(key = this.KEY) {
      this.KEY = key;
      let _contents = localStorage.getItem(key);
      if (_contents) {
        this.contents = JSON.parse(_contents);
      } else {
        this.contents = [];
      }
      this.sync();
    },
    sync: async function() {
      this.syncTotal();

      let _cart = JSON.stringify(this.contents);
      await localStorage.setItem(this.KEY, _cart)

      let textTotalMain = document.getElementById('text_total_cart_main');
      textTotalMain.innerText = this.total();
    },
    syncTotal: function() {
      if (this.contents.length > 0) {
        this.contents.forEach(function(product, index) {
          let _qty = parseInt(this.contents[index].qty);
          let _price = parseInt(this.contents[index].hrg_jual);
          this.contents[index].total_hrg = _qty * _price;
        }.bind(this));
      }
    },
    total: function() {
      let _totalCart = 0;

      if (CART.contents.length > 0) {
        this.contents.forEach(function(product, index) {
          let _qty = parseInt(this.contents[index].qty);
          let _price = parseInt(this.contents[index].hrg_jual);
          _totalCart += (_qty * _price);
        }.bind(this));
        return _totalCart;
      } else {
        return 0;
      }
    },
    add: async function(data, qty = 1) {
      this.product = {
        id_produk: data.id_produk,
        kode_produk: data.kode_produk,
        nama_produk: data.nama_produk,
        hrg_jual: data.hrg_jual,
        hrg_beli: data.hrg_beli,
        qty: qty,
        total_hrg: parseInt(data.hrg_jual) * qty
      }

      if (this.contents.length > 0) {
        for (let i = 0; i < this.contents.length; i++) {
          if (this.contents[i].id_produk == data.id_produk) {
            this.increase(this.contents[i].id_produk, qty);
            break;
          } else if (i == this.contents.length - 1) {
            this.contents.push(this.product);
            break;
          }
        }
      } else {
        this.contents.push(this.product);
      }

      this.sync();
      // await localStorage.setItem(this.KEY, JSON.stringify(this.contents));
    },
    get: function() {
      // let localStorageContent = localStorage.getItem(this.KEY);
      this.init();
      return this.contents;
    },
    find: function(id, callback) {
      let check = false;
      let index = null;
      for (let i = 0; i < this.contents.length; i++) {
        if (this.contents[i].id_produk == id) {
          check = true;
          index = i;
          break;
        } else {
          check = false;
        }
      }
      return callback(check, index);
    },
    increase: function(id, addQty = 1) {
      this.contents.forEach(function(product, index) {
        if (product.id_produk == id) {
          let _qty = parseInt(this.contents[index].qty);
          this.contents[index].qty = _qty + parseInt(addQty);
        }
      }.bind(this));
      this.sync();
    },
    decrease: function(id) {
      this.find(id, function(check, index) {
        if (check) {
          console.log('decrease : ' + true);
          let _qty = parseInt(this.contents[index].qty);
          this.contents[index].qty = _qty - 1;
        }
      }.bind(this));
      this.sync();
    },
    delete: function(id) {
      this.contents.forEach(function(product, index) {
        if (product.id_produk == id && parseInt(product.qty) <= 1) {
          this.contents.splice(index, 1);
        } else if (product.id_produk == id) {
          this.decrease(id);
        }
      }.bind(this));
      this.sync();
    },
    removeAll: function() {
      this.contents = [];
      this.sync();
    },
    remove: function(id) {
      this.contents.forEach(function(product, index) {
        if (product.id_produk == id) {
          this.contents.splice(index, 1);
        }
      }.bind(this));
      this.sync();
    },
    checkout: function() {
      let dataProduct = this.get();
      let stockIsAvailable = false;
      console.log(dataProduct);
      $.ajax({
        type: 'post',
        url: '<?php echo site_url('product/check_stock'); ?>',
        async: true,
        dataType: 'JSON',
        data: {
          cart_products: dataProduct // Data
        },
        success: function(data) {
          console.log(data);
          if (data != null && data.length > 0) {
            for (let i = 0; i < data.length; i++) {
              if (parseInt(data[i].stok_produk) > 0) {
                CART.find(data[i].id_produk, function(check, index) {
                  let _qtyFromCart = parseInt(CART.contents[index].qty);
                  let _stockFromReal = parseInt(data[i].stok_produk);
                  if (check && _qtyFromCart > _stockFromReal) {
                    alert(`Stok ${data[i].nama_produk} tidak mencukupi, akan disesuaikan stoknya`);
                    CART.contents[index].qty = _stockFromReal;
                    CART.sync();
                    stockIsAvailable = true;
                    cartTable.reload(CART.get());
                  }
                }.bind(CART));
                // confirm(`Stok ${data[i].nama_produk} Tidak mencukupi, sesuaikan stok?`);
              } else {
                alert(`Stok ${data[i].nama_produk} kosong, akan terhapus dari keranjang`);
                CART.remove(data[i].id_produk);
                stockIsAvailable = true
                cartTable.reload(CART.get());
              }
            }
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(jqXHR.status + ' : ' + errorThrown);
        }
      });
      return stockIsAvailable;
    },
    submitTransaction: function() {

    }
  }

  const cartTable = {
    dataCart: null,
    init: function(data) {
      this.dataCart = $('#dataCart').DataTable({
        scrollY: "227px",
        scrollCollapse: true,
        paging: false,
        info: false,
        filter: false,
        ordering: false,
        data: data,
        columns: [{
            data: "kode_produk"
          },
          {
            data: "nama_produk"
          },
          {
            data: "hrg_jual"
          },
          {
            data: "qty",
          },
          {
            data: null,
            render: function(data, type, full, meta) {
              return "Rp. " + full.total_hrg
            }
          },
          {
            data: null,
            render: function(data, type, full, meta) {
              return `
              <a id="cart_add_product" data_code="${full.kode_produk}" data_id="${full.id_produk}" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus text-white"></i></a>
              <a id="cart_delete_product" data_code="${full.kode_produk}" data_id="${full.id_produk}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-minus text-white"></i></a>`;
            }
          }
        ]
      });
    },
    reload: function(newData) {
      // console.log(newData)
      this.dataCart.clear();

      for (let i = 0; i < newData.length; i++) {
        this.dataCart.row.add(newData[i]);
      }
      this.dataCart.columns.adjust().draw();
      // // console.log(this.dataCart);
    }
  }
  // -< End Cart Area
</script>