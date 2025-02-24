<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  $(document).ready(function() {
    $(document).on('click', '.pagination-item', function(e) {
      e.preventDefault();  

      var page = $(this).attr('href').split('=')[1];  
      loadPage(page);  
    });

    function loadPage(page) {
      $.ajax({
        url: '/services',  
        type: 'GET',
        data: { page: page }, 
        dataType: 'json',  
 
        success: function(response) {
          $('.swap-section__content').html(response.content);
          $('#pagination').html(response.pagination);
        },
        error: function() {
          alert('Ошибка загрузки данных');
        }
      });
    }
  });
