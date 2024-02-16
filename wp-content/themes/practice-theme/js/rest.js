//create post using rest api 
var quickAddBtn = document.querySelector('.quick-add-btn');
var quickAdd = document.querySelector('.quick-add');

if (quickAddBtn) {
  quickAddBtn.addEventListener("click", function () {
    var postData = {
      "title": document.querySelector('.quick-add [name="title"]').value,
      "content": document.querySelector('.quick-add [name="content"]').value,
      "status": "publish"
    };

    jQuery.ajax({
      url: 'http://localhost/kartik/wordpressfolder/wordpress/wp-json/wp/v2/posts',
      type: 'POST',
      headers: {
        "X-WP-Nonce": restObj.restNonce
      },
      contentType: "application/json;charset=UTF-8",
      data: JSON.stringify(postData),
      success: function (response) {
        console.log('Post created successfully:', response);
      },
      error: function (xhr, textStatus, errorThrown) {
        console.error('Error creating post. Status:', xhr.status, 'Response:', xhr.responseText);
      }
    });
  });
}

//to get posts using rest api
jQuery(document).ready(function ($) {

  $('.load-button').on("click", function () {
    $.ajax({
      url: 'http://localhost/kartik/wordpressfolder/wordpress/wp-json/wp/v2/posts',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        createHTML(data);
        console.log(data);
      },
      error: function (xhr, textStatus, errorThrown) {
        console.log("Error: " + errorThrown);
      }
    });
  });

  function createHTML(data) {
    var ourHtml = '';
    for (var i = 0; i < data.length; i++) {
      ourHtml += `
      <div>
      <h2 class="post-id">ID: ${data[i].id}</h2>
      <label for="title">Title:</label>
      <input type="text" class="post-title" name="title" value="${data[i].title.rendered}"> 
      <button class="delete-post" onclick="deletePost(${data[i].id});">Delete</button>
      <button class="update-post" onclick="updatePost(this,${data[i].id});">Update</button>
      </div>`;
    }
    $('.new-content').append(ourHtml);
    $('.load-button').hide();
  };
});

//function to delete post using rest api
function deletePost(postId) {
  var confirmDelete = window.confirm(`Are you sure you want to delete the post "${postId}"?`);

  if (confirmDelete) {
    jQuery.ajax({
      url: `http://localhost/kartik/wordpressfolder/wordpress/wp-json/wp/v2/posts/${postId}`,
      type: 'DELETE',
      headers: {
        "X-WP-Nonce": restObj.restNonce
      },
      success: function (response) {
        console.log('Post deleted successfully:', response);
      },
      error: function (xhr, textStatus, errorThrown) {
        console.error('Error deleting post. Status:', xhr.status, 'Response:', xhr.responseText);
      }
    });
  } else {
    alert('Deletion canceled.');
  }
}

function updatePost(clickedButton, id) {
  var postTitle = jQuery(clickedButton).siblings('.post-title').val();
  console.log(postTitle);
  var confirmUpdate = window.confirm(`Are you sure you want to update the post ?`);
console.log(restObj.restNonce);
  if (confirmUpdate) {
    jQuery.ajax({
      url: `http://localhost/kartik/wordpressfolder/wordpress/wp-json/wp/v2/posts/${id}`,
      type: 'PUT',
      headers: {
        "X-WP-Nonce": restObj.restNonce
      },
      contentType: "application/json;charset=UTF-8",
      data: JSON.stringify({ "title": postTitle }),
      success: function (response) {
        console.log('Post title updated successfully:', response);
      },
      error: function (xhr, textStatus, errorThrown) {
        console.error('Error updating post title. Status:', xhr.status, 'Response:', xhr.responseText);
      }
    });
  } else {
    alert('Update canceled.');
  }
}
