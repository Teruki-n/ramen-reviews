
    function deletePost(id) {
    'use strict'
    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
        document.getElementById(`form_${id}`).submit();
    }
    
            
     function displayImagePreview(event) {
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        const file = event.target.files[0];
        console.log(file, imagePreviewContainer.style.display);
        
        if (file) {
            console.log('show image');
            const reader = new FileReader();
    
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block';
            }
    
            reader.readAsDataURL(file);
        } else {
            console.log('hide image');
            imagePreviewContainer.style.display = 'none';
        }
    }
}
        
