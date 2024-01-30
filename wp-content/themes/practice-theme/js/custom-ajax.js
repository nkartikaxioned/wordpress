// jQuery(document).ready(function ($) {
//     var postsPerPage = 3; // Number of posts per load
//     var currentSpeakerCount = 6;
//     // Function to load more posts
//     function loadMorePosts() {
//         console.log(currentSpeakerCount);
//       $.ajax({
//         url: ajax_object.ajax_url,
//         type: 'post',
//         data: {
//           action: 'get_posts_data',
//           current_speaker_count: currentSpeakerCount,
//         },
//         success: function (response) {
//           $('.speakers-list').append(response);
//           currentSpeakerCount += postsPerPage;
  
//           // Check if there are more posts
//           if (response.trim() === '') {
//             $('#load-more-button').hide();
//             currentSpeakerCount = $('.speaker-container').length;
//           }
//           toggleShowLessButton();
//         }
//       });
//     }

//     // Function to show or hide "Show Less" button
//     function toggleShowLessButton() {
//       var totalPosts = $('.speaker-container').length;
  
//       if (totalPosts > postsPerPage) {
//         $('#show-less-button').show();
//        } else {
//         $('#show-less-button').hide();
//       }
//     }
  
//     $('#show-less-button').on('click', function () {
//       $('.speaker-container').slice(-postsPerPage).remove();
//       currentSpeakerCount -= postsPerPage;
  
//       $('#load-more-button').show();
//       toggleShowLessButton();
//     });
  
//     $('#load-more-button').on('click', function () {
//       loadMorePosts();
//     });
//   });

jQuery(document).ready(function ($) {

$('.filter').on('click',function(){

  const checkboxes = document.querySelectorAll('input[name="list[]"]:checked');
  const checkedValues = Array.from(checkboxes).map(checkbox => checkbox.value);
  let selectedValue;
// console.log(checkedValues);
// if (checkboxes) {
//     selectedValue = checkboxes.value;
//     console.log(selectedValue);
// } 
//   const checkedValues = [];
//   checkboxes.forEach(checkbox => {
//   checkedValues.push(checkbox.value);
// });
//   console.log('Checked values:', checkedValues);
  $.ajax({
    url: ajax_object.ajax_url,
    type: 'post',
    data: {
      action: 'get_speaker_data',
      speaker_names: checkedValues,
    },
    success: function (response) {
      $('.speakers-list').append(response);
      // console.log(response);
    }
  });
});

$('.search').on('click',function(){
      const name = document.querySelector('.speakers-name').value;
      // console.log(name);
    
      if(name){
      $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: {
          action: 'get_speaker',
          speaker_name: name,
        },
        success: function (response) {
          $('.speakers-list').append(response);
            //console.log(response);
        }
     })
    }else {
      console.log("Empty Field");
    }
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