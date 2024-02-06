jQuery(document).ready(function ($) {
  var postsPerPage = 3; // Number of posts per load
  var currentSpeakerCount = 6;
  
  // Function to load more posts
  function loadMorePosts() {
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'post',
      data: {
        action: 'get_speaker_data',
        current_speaker_count: currentSpeakerCount,
      },
      success: function (response) {
        $('.speakers-list').append(response);
        // Check if there are more posts
        if (response.trim() === '') {
          $('#load-more-button').hide();
         } 
        else if ($(response).find('.speaker-container').length < postsPerPage) {
          console.log("elseif=========>");
          $('#load-more-button').hide();
        } 
        else {
          currentSpeakerCount = $('.speaker-container').length;
        }
        toggleButton();
      }
    });
  }

  // Function to show or hide "Show Less" button
  function toggleButton() {
    var totalPosts = $('.speaker-container').length;

    if (totalPosts > postsPerPage) {
      $('#show-less-button').show();
      } else {
      $('#show-less-button').hide();
    }
  }

  $('#show-less-button').on('click', function () {
    $('.speaker-container').slice(-postsPerPage).remove();
    currentSpeakerCount -= postsPerPage;

    $('#load-more-button').show();
    toggleButton();
  });

  $('#load-more-button').on('click', function () {
    loadMorePosts();
  });
  

  $('.filter').on('click', function () {
    const checkboxes = document.querySelectorAll('input[name="list[]"]:checked');
    const checkedValues = Array.from(checkboxes).map(checkbox => checkbox.value);
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: {
            action: 'get_speaker_data',
            speaker_names: checkedValues,
        },
        success: function (response) {
          $('.speakers-list').empty();
          $('.speakers-list').html(response);
          $('#load-more-button').show();
          currentSpeakerCount = $('.speaker-container').length;
          
          toggleButton();
        }
    });
  });

  // $('.search').on('click',function(){
  //     const name = document.querySelector('.speakers-name').value;
  //     $.ajax({
  //       url: ajax_object.ajax_url,
  //       type: 'post',
  //       data: {
  //         action: 'get_speaker',
  //         speaker_name: name,
  //       },
  //       success: function (response) {
  //         $('.speakers-list').empty();
  //         $('.speakers-list').html(response);
  //       }
  //     })
  //   });

    // Reload the page
    $('.clear-button').on('click', function() {
      location.reload();
    });
  });
    
    // jQuery(document).ready(function ($) {
    //   $('.search').on('click',function(){
    //     const name = document.querySelector('.speakers-name').value;
    //     // console.log(name);
      
    //     if(name){
    //     $.ajax({
    //       url: ajax_object.ajax_url,
    //       type: 'post',
    //       data: {
    //         action: 'get_speaker',
    //         speaker_name: name,
    //       },
    //       success: function (response) {
    //         $('.speakers-list').append(response);
    //           //console.log(response);
    //       }
    //    })
    //   }else {
    //     console.log("Empty Field");
    //   }
    //   });
    // });