    // 全てのチェックボックスの変更イベントをキャプチャする
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterPosts);
    });

    // 投稿のフィルタリング
    function filterPosts() {
        const posts = document.querySelectorAll('.post-content');
    
        // フィルタタイプごとにグループ化されたチェックボックスを取得
        const filterGroups = Array.from(checkboxes).reduce((groups, checkbox) => {
            if (!groups[checkbox.dataset.filterType]) {
                groups[checkbox.dataset.filterType] = [];
            }
            groups[checkbox.dataset.filterType].push(checkbox);
            return groups;
        }, {});
    
        posts.forEach(post => {
            const satisfiesAllFilters = Object.values(filterGroups)
                .every(group => {
                    // そのグループ内で選択されているチェックボックスが一つでもあれば、そのチェックボックスのいずれかが投稿に該当することを確認
                    const checkedInGroup = group.filter(checkbox => checkbox.checked);
                    if (checkedInGroup.length === 0) {
                        return true; // そのグループ内で何も選択されていなければ、そのグループは全ての投稿に該当するとみなす
                    }
                    return checkedInGroup.some(checkbox => {
                        const filterValue = checkbox.value;
                        const postFilterValues = post.dataset[checkbox.dataset.filterType].split(",");
                        return postFilterValues.includes(filterValue);
                    });
                });
    
            if (satisfiesAllFilters) {
                post.classList.remove('hidden');
            } else {
                post.classList.add('hidden');
            }
        });
    }
        
        