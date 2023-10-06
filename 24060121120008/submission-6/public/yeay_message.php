<?php
// Nama : Tiara Fitra Ramadhani Siregar
// Nim  : 24060121120008
// lab  : PBP A2

include('header.html');

?>
  <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
        <h1 class="mt-4 text-3xl font-bold tracking-tight  text-indigo-600 sm:text-5xl">Success!</h1>
        <p class="mt-6 text-base leading-7 text-gray-600">Data has been successfully inserted!</p>
        <div class="mt-4">
            <img src="bebek.gif" alt="Success GIF" width="320" height="240" class="rounded-full">
        </div>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <button id="back" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="goBack()">Go back</button>
        </div>
    </div>
  </main>
  <script>
  function goBack() {
    window.location.href = 'form_input_pendaftaran.php';
  }
</script>

<?php include('footer.html') ?>