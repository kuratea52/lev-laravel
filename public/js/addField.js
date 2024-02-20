document.getElementById('add-more-fields').addEventListener('click', function() {
    // 現在の入力欄数を取得
    var currentFieldsCount = document.querySelectorAll('[id^="place_visited_"]').length;

    // 入力欄が20未満の場合にのみ追加入力欄を生成
    if (currentFieldsCount < 20) {
        var additionalFields = document.getElementById('additional-fields');
        var newFields = document.createElement('div');

        newFields.innerHTML = `
            <div class="mt-2 flex items-center">
                <input id="place_visited_${currentFieldsCount + 1}" name="place_visited_${currentFieldsCount + 1}" type="text" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="行った場所${currentFieldsCount + 1}" />
                <textarea id="impressions_${currentFieldsCount + 1}" name="impressions_${currentFieldsCount + 1}" rows="2" class="block ml-2 w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="感想${currentFieldsCount + 1}"></textarea>
            </div>
        `;
        additionalFields.appendChild(newFields);
    }
});
