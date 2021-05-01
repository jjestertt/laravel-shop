const productSortingBtn = document.querySelectorAll('.product_sorting_btn');
const productGrid = document.querySelector('.product_grid');
const sortingText = document.querySelector('.sorting_text');

const sortBy = async (btn) => {
    const response = await fetch("{{route('showCategory', $category->alias)}}", {
        method: 'POST',
        headers: {
            //Обязательные заголовки!!!!
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        //Обязательно указывать метод который преобразует обьект в строку!!!
        body: JSON.stringify({
            orderBy: btn.dataset.order,
        }),
    });
    //С сервера к нам приходит разметка
    const view = await response.text();
    //Рендерим ее без перезагрузки
    productGrid.innerHTML = view;
    //И меняем текст в инпуте сортировки
    sortingText.innerText = btn.innerText
    // сброс настроек сетки чтобы ничего не ломалось
    let iso = new Isotope(productGrid, 'destroy');
    //С помощью плагина ждем пока загрузятся все изображения, и строи сетку
    imagesLoaded(productGrid, function (instance) {
        iso = new Isotope(productGrid, {
                itemSelector: '.product',
                layoutMode: 'fitRows',
                fitRows:
                    {
                        gutter: 30
                    },
            }
        );
    });
}
//отлавливаем клик по кнопке
productSortingBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        sortBy(btn)
    });
});
