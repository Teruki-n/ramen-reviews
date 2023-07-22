/*global infoWindow*/
/*global navigator*/
/*global google*/

function deletePost(id){
  'use strict';
    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
        document.getElementById(`form_${id}`).submit();
    }
}

   
  //geolocation API
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
          position => {
              const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
              };
              document.getElementById('lat').value = pos.lat;
              document.getElementById('lon').value = pos.lng;
          },
          () => {
              handleLocationError(true);
          }
      );
  } else {
      // Browser doesn't support Geolocation
      handleLocationError(false);
  }

  function handleLocationError(browserHasGeolocation){
      document.getElementById('error-message').innerHTML =
          browserHasGeolocation
              ? "エラー: Geolocation サービスに失敗しました。"
              : "エラー: お使いのブラウザはGeolocationをサポートしていません。"
  }


//Maps JavaScript API
function initMap() {
    var maps = document.querySelectorAll('.map');
    maps.forEach(function(mapElem) {
        var lat = parseFloat(mapElem.dataset.lat);
        var lng = parseFloat(mapElem.dataset.lng);
        var location = { lat: lat, lng: lng };
        var map = new google.maps.Map(mapElem, {
            zoom: 14,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    });
}

// checkboxの変更イベントをキャプチャする
        const checkboxes = document.querySelectorAll('.category-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterPostsByCategory);
        });
                // カテゴリーによる投稿のフィルタリング
                function filterPostsByCategory() {
                const selectedCategories = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                    const posts = document.querySelectorAll('.post-content');
                    posts.forEach(post => {
                        const categoryId = post.dataset.categoryId;
                        if (selectedCategories.length === 0 || selectedCategories.includes(categoryId)) {
                            post.classList.remove('hidden');
                        } else {
                            post.classList.add('hidden');
                        }
                    });
                }







