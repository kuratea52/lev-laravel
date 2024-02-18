document.getElementById('add-more-fields').addEventListener('click', function() {
    // 現在の入力欄数を取得
    var currentFieldsCount = document.querySelectorAll('[id^="place_visited_"]').length;

    // 入力欄が20未満の場合にのみ追加入力欄を生成
    if (currentFieldsCount < 20) {
        var additionalFields = document.getElementById('additional-fields');
        var newFields = document.createElement('div');
        var fieldIndex = currentFieldsCount + 1;

        newFields.innerHTML = `
            <div class="mt-2 flex items-center">
                <input id="place_visited_${fieldIndex}" name="place_visited_${fieldIndex}" type="text" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="行った場所${fieldIndex}" />
                <textarea id="impressions_${fieldIndex}" name="impressions_${fieldIndex}" rows="2" class="block ml-2 w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="感想${fieldIndex}"></textarea>
            </div>
        `;
        additionalFields.appendChild(newFields);
    }
});