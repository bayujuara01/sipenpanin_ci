<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale_model extends CI_Model
{
  private $_table = "tb_penjualan";

  public function generateInvocie()
  {

    $sql = "SELECT MAX(MID(invoice, 9, 4)) AS invoice_no 
            FROM $this->_table 
            WHERE MID(invoice, 3, 6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      $row = $query->row();
      $no = ((int) $row->invoice_no) + 1;
      $invoice_no =  sprintf("%'04d", $no);
    } else {
      $invoice_no = "0001";
    }

    $invoice = "SM" . date('ymd') . $invoice_no;
    return $invoice;
  }
}
