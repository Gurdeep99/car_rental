<footer id="footer" class="footer">
  <div class="credits">
    Designed by <a href="">Soumys & Sufia</a>
  </div>
</footer>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


<!-- <script>
  function sweetAlert(id, link) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirmed deletion, perform the delete action
        deleteItem(id, link);
      }
    });
  }

  function deleteItem(id, link) {
    // Perform AJAX request to delete script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", link + "?id=" + id, true);
    xhr.onload = function () {
      if (xhr.status == 200) {
        // Successful response from delete script
        Swal.fire({
          title: "Deleted!",
          text: xhr.responseText,
          icon: "success"
        });
      } else {
        // Error response from delete script
        Swal.fire({
          title: "Error!",
          text: "An error occurred while deleting the record.",
          icon: "error"
        });
      }
    };
    xhr.send();
  }
</script> -->
<script>
  function sweetAlert(id, link) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirmed deletion, perform the delete action
        deleteItem(id, link);
      }
    });
  }

  function deleteItem(id, link) {
    // Perform AJAX request to delete script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", link + "?id=" + id, true);
    xhr.onload = function () {
      if (xhr.status == 200) {
        // Successful response from delete script
        Swal.fire({
          title: "Deleted!",
          text: xhr.responseText,
          icon: "success"
        }).then(() => {
          // Reload the page after the success message is closed
          location.reload();
        });
      } else {
        // Error response from delete script
        Swal.fire({
          title: "Error!",
          text: "An error occurred while deleting the record.",
          icon: "error"
        });
      }
    };
    xhr.send();
  }
</script>

