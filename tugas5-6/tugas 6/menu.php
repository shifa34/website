<div class="row">
  <div class="col-md-6">
    <h4>Daftar Menu</h4>
    <ul id="menu-list" class="list-group">
      <?php
      $menuData = [
        ['id' => 1, 'name' => 'Mie Ayam', 'price' => 10000],
        ['id' => 2, 'name' => 'Mie Goreng', 'price' => 8000],
        ['id' => 3, 'name' => 'Nasi Goreng', 'price' => 12000],
        ['id' => 4, 'name' => 'Nasi Kuning', 'price' => 18000],
        ['id' => 5, 'name' => 'Soto', 'price' => 9000],
        ['id' => 6, 'name' => 'Bakso', 'price' => 8000],
        ['id' => 7, 'name' => 'Lontong', 'price' => 5000],
        ['id' => 8, 'name' => 'Sate', 'price' => 15000],
        ['id' => 9, 'name' => 'Pical', 'price' => 20000],
        ['id' => 10, 'name' => 'Gado-Gado', 'price' => 12000],

      ];

      foreach ($menuData as $item) {
        echo '<li class="list-group-item menu-item" data-id="' . $item['id'] . '" data-price="' . $item['price'] . '">';
        echo $item['name'] . ' - ' . formatCurrency($item['price']);
        echo ' <button class="btn btn-sm btn-success float-right" onclick="tambahMenu(' . $item['id'] . ',' . $item['price'] . ')">+</button>';
        echo ' <button class="btn btn-sm btn-danger float-right" onclick="kurangMenu(' . $item['id'] . ',' . $item['price'] . ')">-</button>';
        echo '</li>';
      }

      function formatCurrency($amount) {
        return 'Rp ' . number_format($amount, 0, ',', '.');
      }
      ?>
    </ul>
  </div>

  <div class="col-md-6">
    <h4>Pesanan Anda</h4>
    <ul id="order-list" class="list-group">
      <!-- Item terpilih dan total biaya akan ditambahkan secara dinamis di sini menggunakan JavaScript -->
    </ul>
    <h5>Total Biaya: <span id="total-cost">Rp 0</span></h5>
    <button class="btn btn-success" onclick="bayar()">Bayar</button>
  </div>
</div>
