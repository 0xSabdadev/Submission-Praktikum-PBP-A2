<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php include('header.html') ?>
<br>
<div class="card">
   <div class="card-header">Search Book</div>
   <div class="card-body">
      <input type="text" class="form-control" id="input_user" name="input_user" oninput="showBook()" placeholder="Ketik judul buku">
      <br>
      <div id="result_book"></div>
   </div>
</div>
<?php include('footer.html') ?>